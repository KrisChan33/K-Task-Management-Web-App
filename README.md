
# Application Overview
This document provides an overview of the application's features, including user roles, project management, and navigation options.

---

## Screenshots
- Dark Mode:![Dark Mode](image.png)
- Light Mode:![Light Mode](image-1.png)
- Registration Page:![Registration](image-3.png)

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
![Project Management](image-24.png)
Panel users (admins) can create their own projects, assign tasks, and add comments. The Project Management navigation is for admin use only.

#### Project Controller
![Project Controller](image-6.png)
- Assign projects to multiple users
- Edit/delete projects
- View project details in a table format:
  ![Projects Listed](image-8.png)
  
#### Project Details
After assignment, super admins, admins, and assigned users can comment on projects:
![Project Details](image-9.png)

#### Comment Management
- Super admins, admins, and assigned users can comment on projects:
  ![Commenting on a Project](image-10.png)
- Admin comment controller:
  ![Admin Comment Controller](image-11.png)
- Assigned users can view comments:
  ![User Comment View](image-12.png)

---

### Task Controller
- Tasks can be created per project and assigned to users, with visibility limited to their own or assigned tasks.
  ![Task Controller](image-14.png)

#### Task Column
Super admins can see, delete, and edit all tasks; users can access their own tasks.
![Task Column](image-15.png)

#### Comments Controller
- Create and manage comments, with options to edit and delete:
  ![Comments Controller](image-17.png)
- Super admin comment table:
  ![Super Admin Comment Controller](image-18.png)

---

### User Management
Super admins can create users and assign roles.
![User Management](image-19.png)
- **Users Table (Super Admin Only)**:
  Super admins can view all users:
  ![Users Table](image-20.png)

---

### Profile Management
Both admins and users can edit their profiles, with options to:
- Add profile pictures
- Update personal information
- Manage accounts (API Tokens, browser sessions, account deletion)
  
![Edit Profile](image-21.png)
![Edit Profile](image-22.png)

---

### 2FA Authentication
Two-factor authentication (2FA) is currently disabled.

---

### Filament Shield Navigation (Roles & Permissions)
Super admins can manage user roles and permissions.
![Roles/Permissions](image-23.png)

---

## User Panel

### User Interface
Users with the `panel_user` role have access to a restricted interface.
![User Panel](image-28.png)

### Navigation Groups
Panel users have access to two navigation groups:
- **Project Management** (projects, tasks, comments)
- **User Management** (edit profile)
  ![Navigation Groups](image-29.png)

Panel users have limited access compared to super admins and cannot access certain controllers.

---

### Projects
Users can view projects assigned by super admins but cannot delete them. They can, however, edit tasks and add comments.
![Projects](image-30.png)

#### Project Edit Restrictions
Users cannot edit project details like name, status, or description; only the assigner can.
![Project Edit Restrictions](image-31.png)

#### Task/Comment Management
- Users can edit the 'Status' of assigned tasks but cannot delete them:
  ![Edit Project Task/Comment](image-32.png)
- Comments within the project are restricted to the assigner for editing/deletion:
  ![Project Comment](image-34.png)

---

### Tasks and Comments
- **Tasks**: Users can view and create their own tasks.
  ![Tasks](image-37.png)
  ![Tasks](image-38.png)
- **Comments**: View all created and assigned project comments.
  ![Comments](image-39.png)

---

### Edit Profile
Users have similar profile-editing options as admins, including photo management (see Admin Edit Profile for example).

---

End of document.
