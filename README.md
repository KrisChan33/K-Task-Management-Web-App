# Application Overview

## Support Dark Mode

![Dark Mode](image.png)
![Dark Mode](image-1.png)
![Registration](image-3.png) Registration

## Admin Panel

![Admin Panel](image-25.png)

### Features
- Project Management for only super admin access.
  - Comment Controller (add/delete/update/manipulate data)
  - Dark mode, Light mode, System mode.
  - Super admin can access 4 Navigation groups:
    - Project
    - Project for admin
    - User management
    - Filament Shield for roles and permissions
  - The project management includes Projects, Tasks, and Comments.
  - Two different user roles: admin (with access to a controller) and user.

### Project Management Navigation
![Project Management](image-24.png) 
Project management for panel_user role. Admin can also create their own projects, assign tasks, and comment. The Project Management (admin) navigation is a full access controller for admin only.

#### Project Controller
![Project Controller](image-6.png)  
Can assign projects to multiple users, edit, and delete projects.

![Projects Listed](image-8.png) 
After assigning to users, the projects are listed in a table.

![Project Details](image-9.png) 
After assigning, the details are visible. Super admin, admin, and assigned users can comment on the project.

![Commenting on a Project](image-10.png)
![Admin Comment Controller](image-11.png) 
Admin comment controller table.

![User Comment View](image-12.png) 
Comments visible to the assigned user.

#### Task Controller
![Task Controller](image-14.png) 
Can create tasks for a project. Users cannot manipulate projects assigned by admin.

#### Task Column
![Task Column](image-15.png) 
Super admin can see, delete, and edit all tasks. Users can only see their own or assigned tasks.

#### Comments Controller
![Comments Controller](image-17.png) 
Create comments controller, see who posted, edit, and delete comments.

![Super Admin Comment Controller](image-18.png) 
Super admin comment controller table.

### User Management
![User Management](image-19.png) 
Creating users and assigning roles (super admin only).

### Users Table (Super Admin Only)
Admin can see all users:
![Users Table](image-20.png) 
Users Table (Super admin only)

### Profile Management
Admins and users can edit their profiles:
![Edit Profile](image-21.png)
![Edit Profile](image-22.png)

- Add profile picture
- Update personal info
- Manage other accounts/details
  - API Token
  - Save/Logout Browser Session
  - Delete your own account

### 2FA Authentication
2FA authentication is currently disabled.

### Filament Shield Navigation
#### Roles/Permissions
![Roles/Permissions](image-23.png) 
Roles/Permissions

This is the controller for user roles, determining whether they can view, edit, create, etc. Be careful when assigning access. The default role is `panel_user`. Below are the details:

![Roles/Permissions Details](<Screenshot 2024-11-08 084606.png>)
![Roles/Permissions Details](image-27.png)

## User Panel

### Interface
![User Panel](image-28.png) 
Interface of panel_user role.

### Navigation Groups
There are two navigation groups: Project Management and User Management:
![Navigation Groups](image-29.png)

- Projects
- Tasks (visible after clicking a project)
- Comments
- Edit Profile

Panel users do not have access to super admin controllers and navigations.

### Projects
![Projects](image-30.png) 
Projects assigned by super_admin. Users cannot delete these projects but can edit and add their own tasks and comments.

![Project Edit Restrictions](image-31.png) 
Users cannot edit the project name, status, and description. Only the assigner (super admin) can.

### Edit Project Bottom Task/Comment
![Edit Project Task/Comment](image-32.png) 
Tasks created by super admin and assigned to admin/user. Users can only edit the 'Status' or view the task. Only the creator can delete the task.
![Edit Project Task/Comment](image-33.png)

![Project Comment](image-34.png) 
Comments inside the project. Only the user who assigned the comment can delete/edit their own comment.
![Project Comment](image-36.png)

### Tasks
![Tasks](image-37.png) 
View all created and assigned tasks.
![Tasks](image-38.png) 
Create own task.

### Comments
![Comments](image-39.png) 
View all created comments and comments in the assigned project.

### Edit Profile
Nothing to show here. You can see it same as the Admin Edit Profile. You can see the photo up in the admin panel :).