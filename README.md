# Blogger - A Laravel Blog Platform

**Blogger** is a simple yet powerful blog platform built with **Laravel**. It allows users to create, read, update, and delete blog posts. The platform includes user authentication, post categories, and optional features like comments and search functionality.

---

## Features

- **User Authentication**: Register, login, and logout functionality.
- **CRUD Operations**: Create, read, update, and delete blog posts.
- **Categories**: Organize posts into categories.
- **Pagination**: Browse posts with pagination.
- **File Uploads**: Upload images for blog posts.
- **Optional Features**:
  - Comments system.
  - Search functionality.
  - Roles and permissions (Admin, Writer).

---

## Technologies Used

- **Backend**: Laravel (PHP)
- **Frontend**: Blade Templating, Tailwind CSS (or Bootstrap)
- **Database**: MySQL
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
   - **Tailwind CSS** (or Bootstrap) is used for styling.
   - Optional interactivity (e.g., dropdowns, modals) can be added using **Alpine.js**.

5. **Database**:
   - The database consists of the following tables:
     - `users`: Stores user information.
     - `posts`: Stores blog posts.
     - `categories`: Stores post categories.
     - `comments` (optional): Stores user comments on posts.
   - Relationships:
     - A **user** has many **posts**.
     - A **post** belongs to a **category**.
     - A **post** has many **comments** (optional).

6. **Routing**:
   - Routes are defined in `routes/web.php`.
   - Public routes (e.g., homepage, post details) are accessible to all users.
   - Authenticated routes (e.g., create post, edit post) are restricted to logged-in users.

7. **Controllers**:
   - Controllers handle the logic for each feature:
     - `PostController`: Manages CRUD operations for posts.
     - `CategoryController`: Manages categories (optional).
     - `CommentController`: Manages comments (optional).

8. **Views**:
   - Views are created using **Blade templates**:
     - `layouts/app.blade.php`: Main layout file.
     - `posts/index.blade.php`: Lists all posts.
     - `posts/show.blade.php`: Displays a single post.
     - `posts/create.blade.php`: Form to create a new post.
     - `posts/edit.blade.php`: Form to edit an existing post.

9. **Optional Features**:
   - **Comments**: Users can comment on posts (optional).
   - **Search**: Users can search for posts by title or content (optional).
   - **Roles and Permissions**: Admins can manage users and posts (optional).

---

## Installation

Follow these steps to set up the project locally:

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- Node.js (for frontend dependencies)

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/blogger.git
   cd blogger
