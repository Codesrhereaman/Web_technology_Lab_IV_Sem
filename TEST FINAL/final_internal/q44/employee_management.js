var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
// Base class implementing Employee interface
var BaseEmployee = /** @class */ (function () {
    // Constructor
    function BaseEmployee(id, name, email, salary) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.salary = salary;
    }
    // Method implementation
    BaseEmployee.prototype.getDetails = function () {
        return "Employee ID: ".concat(this.id, "\nName: ").concat(this.name, "\nEmail: ").concat(this.email, "\nSalary: $").concat(this.salary);
    };
    // Method implementation
    BaseEmployee.prototype.calculateAnnualSalary = function () {
        return this.salary * 12;
    };
    // Method implementation
    BaseEmployee.prototype.giveRaise = function (percentage) {
        var raiseAmount = (this.salary * percentage) / 100;
        this.salary += raiseAmount;
        console.log("".concat(this.name, " received a ").concat(percentage, "% raise. New salary: $").concat(this.salary));
    };
    return BaseEmployee;
}());
// Manager class extending BaseEmployee and implementing ManagerInterface
var Manager = /** @class */ (function (_super) {
    __extends(Manager, _super);
    // Constructor with additional parameters
    function Manager(id, name, email, salary, department, teamSize) {
        // Call parent constructor
        var _this = _super.call(this, id, name, email, salary) || this;
        _this.department = department;
        _this.teamSize = teamSize;
        return _this;
    }
    // Override getDetails method
    Manager.prototype.getDetails = function () {
        return "".concat(_super.prototype.getDetails.call(this), "\nDepartment: ").concat(this.department, "\nTeam Size: ").concat(this.teamSize, "\nRole: Manager");
    };
    // Method implementation specific to Manager
    Manager.prototype.assignTask = function (taskName, employeeName) {
        console.log("Manager ".concat(this.name, " assigned task \"").concat(taskName, "\" to ").concat(employeeName));
    };
    // Method implementation specific to Manager
    Manager.prototype.getDepartmentInfo = function () {
        return "Department: ".concat(this.department, "\nManager: ").concat(this.name, "\nTeam Members: ").concat(this.teamSize);
    };
    // Additional method for calculating bonus
    Manager.prototype.calculateBonus = function () {
        // Managers get 15% annual bonus
        return this.calculateAnnualSalary() * 0.15;
    };
    return Manager;
}(BaseEmployee));
// Developer class implementing Employee interface
var Developer = /** @class */ (function () {
    // Constructor
    function Developer(id, name, email, salary, languages) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.salary = salary;
        this.programmingLanguages = languages;
    }
    // Method implementation
    Developer.prototype.getDetails = function () {
        return "Developer ID: ".concat(this.id, "\nName: ").concat(this.name, "\nEmail: ").concat(this.email, "\nSalary: $").concat(this.salary, "\nSkills: ").concat(this.programmingLanguages.join(', '));
    };
    // Method implementation
    Developer.prototype.calculateAnnualSalary = function () {
        return this.salary * 12;
    };
    // Method implementation
    Developer.prototype.giveRaise = function (percentage) {
        this.salary += (this.salary * percentage) / 100;
        console.log("".concat(this.name, " received a ").concat(percentage, "% raise!"));
    };
    // Developer-specific method
    Developer.prototype.addSkill = function (language) {
        this.programmingLanguages.push(language);
        console.log("".concat(this.name, " learned ").concat(language, "!"));
    };
    return Developer;
}());
// Demo function to demonstrate the program
function demonstrateEmployeeManagement() {
    console.log("=== Employee Management System Demo ===\n");
    // Create a Manager instance
    var manager1 = new Manager(101, "Sarah Johnson", "sarah.j@company.com", 8000, "Engineering", 10);
    console.log("--- Manager Details ---");
    console.log(manager1.getDetails());
    console.log("\nAnnual Salary: $".concat(manager1.calculateAnnualSalary()));
    console.log("Annual Bonus: $".concat(manager1.calculateBonus()));
    console.log();
    // Create Developer instances
    var dev1 = new Developer(201, "Alex Smith", "alex.s@company.com", 6000, ["TypeScript", "Python", "Java"]);
    var dev2 = new Developer(202, "Emily Chen", "emily.c@company.com", 6500, ["JavaScript", "React", "Node.js"]);
    console.log("--- Developer 1 Details ---");
    console.log(dev1.getDetails());
    console.log();
    console.log("--- Developer 2 Details ---");
    console.log(dev2.getDetails());
    console.log();
    // Manager assigning tasks
    console.log("--- Task Assignment ---");
    manager1.assignTask("Implement authentication module", "Alex Smith");
    manager1.assignTask("Design user dashboard", "Emily Chen");
    console.log();
    // Give raises
    console.log("--- Performance Raises ---");
    dev1.giveRaise(10);
    dev2.giveRaise(12);
    manager1.giveRaise(8);
    console.log();
    // Add new skill
    console.log("--- Skill Development ---");
    dev1.addSkill("Rust");
    console.log();
    // Department info
    console.log("--- Department Information ---");
    console.log(manager1.getDepartmentInfo());
    console.log();
    // Array of employees (polymorphism)
    console.log("--- All Employees Annual Salaries ---");
    var employees = [manager1, dev1, dev2];
    employees.forEach(function (emp) {
        console.log("".concat(emp.name, ": $").concat(emp.calculateAnnualSalary(), " per year"));
    });
}
// Run the demonstration
demonstrateEmployeeManagement();