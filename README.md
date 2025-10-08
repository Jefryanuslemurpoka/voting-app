# 🗳️ Laravel Voting App

A Laravel-based web application that provides a secure, real-time, and role-based voting system.  
This project is designed to ensure fairness and transparency in voting, with clear separation between **Admin** and **User** roles.

---

## 🚀 Features

### 👑 Admin
- View voting results in **real time**
- Add new users (only Admin can register users)
- View all registered users
- See which users have **not yet voted**
- Reactivate users who have already voted (to allow another vote if needed)
- Register candidates and manage the list of candidates

### 🙋‍♂️ User
- Login and participate in voting
- View and update their own profile
- Can only vote once (unless reactivated by Admin)

---

## 🛠️ Tech Stack
- **Laravel** (Backend Framework)
- **Blade Templates** (Frontend)
- **MySQL / PostgreSQL** (Database)
- **Bootstrap / TailwindCSS** (UI Styling)
- **Real-time Update** (via AJAX or Laravel Echo, optional)

---

## ⚙️ Installation Guide

1. **Clone the repository**
   ```bash
   git clone https://github.com/jefryanuslemur/voting-app.git
   cd voting-app
