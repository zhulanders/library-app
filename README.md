# 📚 Library App

A simple web-based Library Book Manager built with [CodeIgniter 4](https://codeigniter.com/) and containerized using Docker. This app allows users to:

- Add books with title, author, genre, publication year, and optional cover image
- Edit and update book entries
- Delete books from the list
- View a list of books with their details and cover images

---

## 🚀 Getting Started

### Prerequisites

- [Docker](https://www.docker.com/products/docker-desktop) installed and running
- [Git](https://git-scm.com/)

---

### 📅 Installation

1. **Clone this repository**:

   ```bash
   git clone https://github.com/zhulanders/library-app.git
   cd library-app
   ```

2. **Start containers with Docker Compose**:

   ```bash
   docker-compose up --build -d
   ```

   This sets up:
   - PHP + Apache container
   - MySQL 8 container

3. **Run database migrations (inside the container)**:

   ```bash
   docker exec -it library-app-php bash
   php spark migrate
   exit
   ```

4. **Access the application**:

   Open your browser and go to:

   ```
   http://localhost:8080
   ```

---
Each book can optionally include a cover image. If none is uploaded, the app displays a default placeholder image. Uploaded images are stored in public/uploads/covers/, and paths are stored in the database. I created a layout.php template that allows for a consistent page structure with styling consistent across the whole site.