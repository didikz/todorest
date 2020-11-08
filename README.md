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
