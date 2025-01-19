# Blogger - A Laravel Blog Platform

**Blogger** is a simple yet powerful blog platform built with **Laravel**. It allows users to create, read, update, and delete blog posts. The platform includes user authentication, post categories, and optional features like comments and search functionality.

---

## Features

- **User Authentication**: Register, log in, and manage user profiles.
- **Post Management**: Create, update, delete, and publish blog posts.
- **Comments**: Allow users to comment on blog posts.
- **Categories and Tags**: Organize posts with categories and tags.
- **Search Functionality**: Search for posts by title, content, or tags.
- **Admin/Author**: dashboard.
- **Responsive Design**: Mobile-friendly and optimized for all devices.

## Installation

---

## Technologies Used

- **Backend**: Laravel (PHP)
- **Frontend**: Blade Templating, Tailwind CSS
- **Database**: sqlite
- **Tools**: Composer, Git, Laravel Artisan

---

## How It Works

### **System Overview**
The Blogger platform is built using the **Model-View-Controller (MVC)** architecture. Here's how the system works:

1. **User Authentication**:
   - Users can register, log in, and log out.
   - Authentication is handled by Laravel’s built-in `Auth` system.
   - Protected routes (e.g., creating or editing posts) are restricted to authenticated users using middleware.

2. **Blog Post Management**:
   - Authenticated users can create, read, update, and delete blog posts.
   - Each post belongs to a **category** and is associated with a **user**.
   - Posts are stored in the `posts` table, and relationships are managed using Laravel’s **Eloquent ORM**.

3. **Categories**:
   - Posts are organized into categories (e.g., Technology, Lifestyle).
   - Categories are stored in the `categories` table, and each post belongs to a category.

4. **Frontend Interaction**:
   - The frontend is built using **Blade templates** for dynamic content rendering.
   - **Tailwind CSS** is used for styling.
   - Optional interactivity (e.g., dropdowns, modals) can be added using **Alpine.js**.

5. **Database**:
   - The database consists of the following tables:
     - `users`: Stores user information.
     - `posts`: Stores blog posts.
     - `categories`: Stores post categories.
     - `comments`: Stores user comments on posts.
   - Relationships:
     - A **user** has many **posts**.
     - A **post** belongs to a **category**.
     - A **post** has many **comments**.

6. **Routing**:
   - Routes are defined in `routes/web.php`.
   - Public routes (e.g., homepage, post details) are accessible to all users.
   - Authenticated routes (e.g., create post, edit post) are restricted to logged-in users.

7. **Controllers**:
   - Controllers handle the logic for each feature:
     - `PostController`: Manages CRUD operations for posts.
     - `CategoryController`: Manages categories.
     - `CommentController`: Manages comments.


8. **Optional Features**:
   - **Comments**: Users can comment on posts.
   - **Search**: Users can search for posts by title or content.
   - **Roles and Permissions**: Admins can manage users and posts.

---

## Installation

Follow these steps to set up the project locally:

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Ilies-Bouderba/blog.git
   cd blog
