# Application Overview
This document provides an overview of the application's features, including user roles, project management, and navigation options.

---
## Home Page
![alt text](ReadmeImages/Homepage.png)

---

## Login/Register
- Dark Mode: ![Dark Mode](ReadmeImages/image.png)
- Light Mode: ![Dark Mode](ReadmeImages/image-1.png)
- Registration Page: ![Registration](ReadmeImages/image-3.png)

---

## Admin Panel

### Features
The Admin Panel is accessible only to the super admin and includes:
- **Project Management** with the following controllers:
  - Comments (add/delete/update)
  - Dark, Light, and System modes
- **Super Admin Navigation Groups**:
  - Project Creation
  - Admin Projects
  - User Management
  - Filament Shield (Roles & Permissions)
- **User Roles**: 
  - Admin (controller access)
  - User

---

### Project Management Navigation
![Project Management](ReadmeImages/image-24.png)

admins can also create their own projects.



#### Project Controller
Admin can assign tasks, and add comments. The Project Management navigation is for admin use only.
![Project Controller](ReadmeImages/image-6.png)
 
- Assign projects to multiple users
- Edit/delete projects
- View project details in a table format:
  ![Projects Listed](ReadmeImages/image-8.png)
  
#### Project Details
After assignment, super admins, admins, and assigned users can comment on projects:
![Project Details](ReadmeImages/image-9.png)

#### Comment Management
- Super admins, admins, and assigned users can comment on projects:
  ![Commenting on a Project](ReadmeImages/image-10.png)
- Admin comment controller:
  ![Admin Comment Controller](ReadmeImages/image-11.png)
- Assigned users can view comments:
  ![User Comment View](ReadmeImages/image-12.png)

---

### Task Controller
- Tasks can be created per project and assigned to users, with visibility limited to their own or assigned tasks.
  ![Task Controller](ReadmeImages/image-14.png)

#### Task Column
Super admins can see, delete, and edit all tasks; users can access their own tasks.
![Task Column](ReadmeImages/image-15.png)

#### Comments Controller
- Create and manage comments, with options to edit and delete:
  ![Comments Controller](ReadmeImages/image-17.png)
- Super admin comment table:
  ![Super Admin Comment Controller](ReadmeImages/image-18.png)

---

### User Management
Super admins can create users and assign roles.
![User Management](ReadmeImages/image-19.png)
- **Users Table (Super Admin Only)**:
  Super admins can view all users:
  ![Users Table](ReadmeImages/image-20.png)

---

### Profile Management
Both admins and users can edit their profiles, with options to:
- Add profile pictures
- Update personal information
- Manage accounts (API Tokens, browser sessions, account deletion)
  
![Edit Profile](ReadmeImages/image-21.png)
![Edit Profile](ReadmeImages/image-22.png)

---

### 2FA Authentication
Two-factor authentication (2FA) is currently disabled.

---

### Filament Shield Navigation (Roles & Permissions)
Super admins can manage user roles and permissions.
![Roles/Permissions](ReadmeImages/image-23.png)

### Role Needed to set for 'panel_user'
This is the important Be Careful assigning Permissions. use this for Default.

![alt text](ReadmeImages/paneluserrole.png)
![alt text](ReadmeImages/paneluserrole-2.png)
![alt text](ReadmeImages/paneluserrole-3.png)

---

## User Panel

### User Interface
Users with the `panel_user` role have access to a restricted interface.
![User Panel](ReadmeImages/image-28.png)

### Navigation Groups
Panel users have access to two navigation groups:
- **Project Management** (projects, tasks, comments)
- **User Management** (edit profile)

![Navigation Groups](ReadmeImages/image-29.png)


Panel users have limited access compared to super admins and cannot access certain controllers.

---

### Projects
Users can view projects assigned by super admins but cannot delete them.
![Projects](ReadmeImages/image-30.png)

#### Project Edit Restrictions
Users cannot edit project details like name, status, or description; only the assigner can.
![Project Edit Restrictions](ReadmeImages/image-31.png)

#### Task/Comment Management
- Users can edit the 'Status' of assigned tasks but cannot delete them:
  ![Edit Project Task/Comment](ReadmeImages/image-32.png)
- Comments within the project are restricted to the assigner for editing/deletion:
  ![Project Comment](ReadmeImages/image-34.png)

---

### Tasks and Comments
- **Tasks**: Users can view and create their own tasks.
  ![Tasks](ReadmeImages/image-37.png)
  ![Tasks](ReadmeImages/image-38.png)
- **Comments**: View all created and assigned project comments.
  ![Comments](ReadmeImages/image-39.png)

---

### Edit Profile
Users have similar profile-editing options as admins, including photo management (see Admin Edit Profile for example).

---

## Default Credentials

### Super Admin
- **Email:** superadmin@gmail.com
- **Password:** K-is-king

### User
- **Email:** student@gmail.com
- **Password:** K-is-dev

## Database and Zip File

### Database
The database file is located in the `database` directory. You can import it into your database management system.

- **File:** `database/Database of K Management Web App/k-task-management-web-app-database.sql`

### Zip File
The zip file containing additional resources is located in the `resources` directory.

- **File:** `you can download a zip file here in github`

### Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/KrisChan33/K-Task-Management-Web-App
    ```
2. Navigate to the project directory
   ```bash
   cd K-Task-Management-Web-App
    ```
3. Import the database file into your database management system.
4. Extract the zip file to access additional resources.

---
End of document.
