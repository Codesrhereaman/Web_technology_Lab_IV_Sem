// Interface defining the structure for Employee
interface Employee {
    id: number;
    name: string;
    email: string;
    salary: number;
    
    // Method signatures
    getDetails(): string;
    calculateAnnualSalary(): number;
    giveRaise(percentage: number): void;
}

// Interface for Manager-specific properties
interface ManagerInterface extends Employee {
    department: string;
    teamSize: number;
    
    // Additional method signatures
    assignTask(taskName: string, employeeName: string): void;
    getDepartmentInfo(): string;
}

// Base class implementing Employee interface
class BaseEmployee implements Employee {
    id: number;
    name: string;
    email: string;
    salary: number;
    
    // Constructor
    constructor(id: number, name: string, email: string, salary: number) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.salary = salary;
    }
    
    // Method implementation
    getDetails(): string {
        return `Employee ID: ${this.id}\nName: ${this.name}\nEmail: ${this.email}\nSalary: $${this.salary}`;
    }
    
    // Method implementation
    calculateAnnualSalary(): number {
        return this.salary * 12;
    }
    
    // Method implementation
    giveRaise(percentage: number): void {
        const raiseAmount = (this.salary * percentage) / 100;
        this.salary += raiseAmount;
        console.log(`${this.name} received a ${percentage}% raise. New salary: $${this.salary}`);
    }
}

// Manager class extending BaseEmployee and implementing ManagerInterface
class Manager extends BaseEmployee implements ManagerInterface {
    department: string;
    teamSize: number;
    
    // Constructor with additional parameters
    constructor(
        id: number,
        name: string,
        email: string,
        salary: number,
        department: string,
        teamSize: number
    ) {
        // Call parent constructor
        super(id, name, email, salary);
        this.department = department;
        this.teamSize = teamSize;
    }
    
    // Override getDetails method
    getDetails(): string {
        return `${super.getDetails()}\nDepartment: ${this.department}\nTeam Size: ${this.teamSize}\nRole: Manager`;
    }
    
    // Method implementation specific to Manager
    assignTask(taskName: string, employeeName: string): void {
        console.log(`Manager ${this.name} assigned task "${taskName}" to ${employeeName}`);
    }
    
    // Method implementation specific to Manager
    getDepartmentInfo(): string {
        return `Department: ${this.department}\nManager: ${this.name}\nTeam Members: ${this.teamSize}`;
    }
    
    // Additional method for calculating bonus
    calculateBonus(): number {
        // Managers get 15% annual bonus
        return this.calculateAnnualSalary() * 0.15;
    }
}

// Developer class implementing Employee interface
class Developer implements Employee {
    id: number;
    name: string;
    email: string;
    salary: number;
    programmingLanguages: string[];
    
    // Constructor
    constructor(
        id: number,
        name: string,
        email: string,
        salary: number,
        languages: string[]
    ) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.salary = salary;
        this.programmingLanguages = languages;
    }
    
    // Method implementation
    getDetails(): string {
        return `Developer ID: ${this.id}\nName: ${this.name}\nEmail: ${this.email}\nSalary: $${this.salary}\nSkills: ${this.programmingLanguages.join(', ')}`;
    }
    
    // Method implementation
    calculateAnnualSalary(): number {
        return this.salary * 12;
    }
    
    // Method implementation
    giveRaise(percentage: number): void {
        this.salary += (this.salary * percentage) / 100;
        console.log(`${this.name} received a ${percentage}% raise!`);
    }
    
    // Developer-specific method
    addSkill(language: string): void {
        this.programmingLanguages.push(language);
        console.log(`${this.name} learned ${language}!`);
    }
}

// Demo function to demonstrate the program
function demonstrateEmployeeManagement(): void {
    console.log("=== Employee Management System Demo ===\n");
    
    // Create a Manager instance
    const manager1 = new Manager(
        101,
        "Sarah Johnson",
        "sarah.j@company.com",
        8000,
        "Engineering",
        10
    );
    
    console.log("--- Manager Details ---");
    console.log(manager1.getDetails());
    console.log(`\nAnnual Salary: $${manager1.calculateAnnualSalary()}`);
    console.log(`Annual Bonus: $${manager1.calculateBonus()}`);
    console.log();
    
    // Create Developer instances
    const dev1 = new Developer(
        201,
        "Alex Smith",
        "alex.s@company.com",
        6000,
        ["TypeScript", "Python", "Java"]
    );
    
    const dev2 = new Developer(
        202,
        "Emily Chen",
        "emily.c@company.com",
        6500,
        ["JavaScript", "React", "Node.js"]
    );
    
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
    const employees: Employee[] = [manager1, dev1, dev2];
    
    employees.forEach(emp => {
        console.log(`${emp.name}: $${emp.calculateAnnualSalary()} per year`);
    });
}

// Run the demonstration
demonstrateEmployeeManagement();