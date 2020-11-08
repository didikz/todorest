## TODO RESTful API

This is demo for RESTful API for TO DO Application

## Endpoints

### Authentication

Endpoint to retrieve authentication token to access all protected endpoints

- endpoint: `/api/auth`
- method: `POST`
- headers:
  - `Accept: application/json`
  - `Content-Type: application/json`
- body: `email`, `password`

sample success response (200):

```json
{
    "token": "7|8Xw4eTAYeFmEa3Wa3VRHWzavtUudHugaYpROeiZV"
}
```

### Accessing Protected Endpoint

In order to access protected endpoint, you have to add `Authorization: bearer <token>` to the request header

### Section

#### Fetch All Sections

- endpoint: `/api/sections`
- method: `GET`
- headers:
  - `Accept: application/json`
  - `Authorization: bearer <token>`
- params:
  - `page`. ex: to access page 2 of collection `api/sections?page=2`
  
Sample success response (200):

```json
{
    "data": [
        {
            "id": 1,
            "content": "Qui aspernatur similique.",
            "created_at": "24 minutes ago",
            "updated_at": "24 minutes ago"
        },
        {
            "id": 2,
            "content": "Excepturi recusandae earum sequi.",
            "created_at": "24 minutes ago",
            "updated_at": "24 minutes ago"
        },
        {
            "id": 3,
            "content": "Aut quis.",
            "created_at": "24 minutes ago",
            "updated_at": "24 minutes ago"
        }
    ],
    "links": {
        "first": "http://localhost:8000/api/sections?page=1",
        "last": "http://localhost:8000/api/sections?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/sections?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/sections",
        "per_page": 10,
        "to": 3,
        "total": 3
    }
}
```

#### Create Section

- endpoint: `/api/sections`
- method: `POST`
- headers:
  - `Accept: application/json`
  - `Authorization: bearer <token>`
  - `Content-Type: application/json`
- body:
  - `content`: `string`, `required`
  
Sample success response (201):

```json
{
        "data": {
            "id": 40,
            "content": "new section",
            "created_at": "1 second ago",
            "updated_at": "1 second ago"
        }
    }
```

#### Update Section

- endpoint: `/api/sections/{sectionId}`
- method: `PUT`
- headers:
  - `Accept: application/json`
  - `Authorization: bearer <token>`
  - `Content-Type: application/json`
- parameter:
  - `sectionId`: section id
- body:
  - `content`: `string`, `required`
  
Sample success response (201):

```json
{
        "data": {
            "id": 40,
            "content": "updated section",
            "created_at": "1 second ago",
            "updated_at": "1 second ago"
        }
    }
```
