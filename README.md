# 📘 README

## ✅ Requirements
- PHP 8.1 or higher
- Composer
- MySQL

## ⚙️ Local Installation Steps

### 1. Clone the repository

```bash
git clone https://github.com/pabloInge/clearit
cd clearit
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create the `.env` file

```bash
cp .env.example .env
```

### 4. Configure the `.env` file with your local database settings

Make sure you have a database named `clearit` created in MySQL.

Update the following lines:

```
APP_NAME=Clearit
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clearit
DB_USERNAME=root
DB_PASSWORD=secret
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Run migrations and seeders

This will create all the necessary tables and insert default roles and users.

```bash
php artisan migrate --seed
```

### 7. Start the local server

```bash
php artisan serve
```

Your API should now be running at:

```
http://localhost:8000
```

---

## 👥 Test Users

**Agent**  
Email: `agent@agent.com`  
Password: `agent`  
Role: `agent`

**User**  
Email: `user@user.com`  
Password: `user`  
Role: `user`

---

## ✅ Ready to Use

You can now use the API with tools like Postman.

Perfecto, Pablo. Te armo la documentación base en formato Markdown tipo OpenAPI-light o estilo de API Docs, para que quede profesional y clara.

---

## 📚 API Endpoint Documentation

---

### 🔐 POST `/api/tokens`

**Description:**
Authenticate a user and generate an access token.

**Request:**

```json
{
  "email": "user@example.com",
  "password": "password"
}
```

**Response:**

```json
{
  "token": "access-token"
}
```

**Status Codes:**

* `200 OK`: Authenticated successfully.
* `401 Unauthorized`: Invalid credentials.

---

### 🎫 POST `/api/tickets`

**Description:**
Create a new ticket. Only available for authenticated users with the user role.

**Headers:**

* `Authorization: Bearer {token}`

**Request:**

```json
{
    "name": "Import from Germany",
    "type": 1,
    "transport_mode": "sea",
    "product": "phones", 
    "country": "Germany"
}
```

**Response:**

```json
{
    "name": "Import from Germany",
    "type": 1,
    "transport_mode": "sea",
    "product": "phones",
    "country": "Germany",
    "user_id": 2,
    "updated_at": "2025-07-01T06:57:33.000000Z",
    "created_at": "2025-07-01T06:57:33.000000Z",
    "id": 12
}
```

**Status Codes:**

* `201 Created`: Ticket created.
* `403 Forbidden`: This action is unauthorized.

---

### 📄 POST `/api/tickets/{ticket}/documents`

**Description:**
Upload one or multiple documents to a ticket. Only available for authenticated users with the user role.

**Headers:**

* `Authorization: Bearer {token}`
* `Content-Type: multipart/form-data`

**Request (multipart):**

* `documents[]`: one or more files

**Response:**

```json
[
    {
        "id": 5,
        "ticket_id": 2,
        "file_path": "documents/filename.pdf",
        "created_at": "2025-07-01T07:04:10.000000Z",
        "updated_at": "2025-07-01T07:04:10.000000Z"
    }
]
```

**Status Codes:**

* `201 Created`: Uploaded successfully.
* `403 Forbidden`: This action is unauthorized.

---

### 🔔 POST `/api/tickets/{ticket}/notifications`

**Description:**
Create a simple notification related to a ticket. Only available for authenticated users with the agent role.

**Headers:**

* `Authorization: Bearer {token}`

**Request:**

```json
{
    "message": "Please upload the import form type C.",
    "is_finished": 0  // It's optional. If you send it in 1, complete the ticket.
}
```

**Response:**

```json
{
    "user_id": 2,
    "title": "new in progress",
    "message": "Please upload the import form type C.",
    "ticket_id": 2,
    "updated_at": "2025-07-01T07:13:38.000000Z",
    "created_at": "2025-07-01T07:13:38.000000Z",
    "id": 22
}
```

**Status Codes:**

* `201 Created`: Notification stored.
* `403 Forbidden`: This action is unauthorized.

---

### 🎫 GET `/api/tickets/{ticket}`

**Description:**
Retrieve detailed information about a specific ticket by its ID. Only available for authenticated users with the agent or user role.

**Headers:**

* `Authorization: Bearer {token}`

**Response Example:**

```json
{
    "id": 12,
    "user_id": 2,
    "name": "Import from Germany",
    "type": "1",
    "transport_mode": "sea",
    "product": "phones",
    "country": "Germany",
    "status": "in_progress",
    "updated_at": "2025-07-01T06:57:33.000000Z",
    "created_at": "2025-07-01T06:57:33.000000Z",
    "documents": [
        {
            "id": 1,
            "ticket_id": 2,
            "file_path": "documents/filename.pdf",
            "created_at": "2025-07-01T04:45:58.000000Z",
            "updated_at": "2025-07-01T04:45:58.000000Z"
        },
    ],
    "notifications": [
        {
            "id": 3,
            "user_id": 2,
            "ticket_id": 2,
            "title": "new in progress",
            "message": "Please upload the import form type C.",
            "created_at": "2025-07-01T05:42:43.000000Z",
            "updated_at": "2025-07-01T05:42:43.000000Z"
        }
    ]
}
```

**Status Codes:**

* `200 OK`: Ticket found and returned.
* `403 Forbidden`: User not authorized to view this ticket.
* `404 Not Found`: Ticket does not exist.

---

### 📥 GET `/api/documents/{document}`

**Description:**
Download a specific document. Only available for authenticated users with the agent role.

**Headers:**

* `Authorization: Bearer {token}`

**Response:**
Returns the file as a binary response.

**Status Codes:**

* `200 OK`: File downloaded.
* `403 Forbidden`: This action is unauthorized.
* `404 Not Found`: File doesn't exist.

---
