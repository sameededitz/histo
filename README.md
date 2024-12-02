# Histo Admin Panel

**Histo Admin Panel** is a feature-rich platform for managing chats, messages, and organizing messages into folders. It simplifies communication workflows and provides powerful tools for message storage and categorization.

---

## Features

### 💬 **Chat and Messaging**
- **Real-Time Chats**: Send and receive messages in real-time.
- **Message Search**: Quickly find messages by keywords or filters.
- **Attachments**: Upload and share files, images, and documents in messages.

### 🗂️ **Folder Management**
- **Create Folders**: Organize messages into custom folders.
- **Move Messages**: Drag and drop messages into folders.
- **Folder Permissions**: Restrict access to specific folders for selected users.

### 📊 **Dashboard Insights**
- **Chat Activity**: View analytics for active chats and message volumes.
- **Folder Stats**: Track folder usage and the number of saved messages.
- **User Engagement**: Monitor user participation in chats.

---

## Modules and Functionality

### **Chats**
- Create and manage multiple chat threads.
- Access chat histories with powerful filters and search functionality.

### **Messages**
- Send text, images, and file attachments in chats.
- Save important messages directly to folders.
- Delete or archive messages as needed.

### **Folders**
- Create folders to organize and store critical messages.
- Move messages between folders effortlessly.
- Manage folder structures to keep everything tidy.

---

## Installation

### Prerequisites
- PHP 8.2+
- Laravel 11
- MySQL
- Composer
- Node.js

### Steps
1. **Clone the repository**:
    ```bash
    git clone https://github.com/sameededitz/histo.git
    ```
2. **Navigate to the project directory**:
    ```bash
    cd histo-admin-panel
    ```
3. **Install dependencies**:
    ```bash
    composer install
    npm install && npm run dev
    ```
4. **Set up environment variables**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
5. **Run migrations and seeders**:
    ```bash
    php artisan migrate --seed
    ```
6. **Start the server**:
    ```bash
    php artisan serve
    ```

---

## Usage

### Admin Features
- **Manage Chats**: Oversee all user chats and resolve disputes.
- **Folder Management**: Create, delete, and edit folders for message organization.
- **Message Review**: Search, review, and filter messages for moderation.

### User Features
- **Chat Interface**: Users can send, receive, and search messages.
- **Save Messages**: Important messages can be saved into personal folders.
- **Folder Navigation**: Organize and access saved messages easily.

---

## Technologies Used
- **Backend**: Laravel 11
- **Frontend**: Livewire 3, TailwindCSS
- **Database**: MySQL
- **Real-Time Communication**: Laravel Echo + Pusher
- **File Handling**: Spatie Media Library

---

## Developer Information
- **Developer**: Sameed
- **Instagram**: [@not_sameed52](https://www.instagram.com/not_sameed52/)
- **Discord**: sameededitz
- **Linktree**: [linktr.ee/sameededitz](https://linktr.ee/sameededitz)
- **Company**: TecClubb
  - **Website**: [https://tecclubb.com/](https://tecclubb.com/)
  - **Contact**: tecclubb@gmail.com

---

## Contributing
We welcome contributions! Fork the repository, create a new branch, and submit a pull request. For larger changes, please open an issue first to discuss.

---

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Contact
For inquiries or support, reach out via:
- **Email**: tecclubb@gmail.com
- **Website**: [https://tecclubb.com/](https://tecclubb.com/)
