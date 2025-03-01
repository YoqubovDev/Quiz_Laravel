# API Hujjatlari

Ushbu hujjatda API endpointlari va ularning ishlatilishi haqida ma'lumot beriladi.
https://documenter.getpostman.com/view/40396173/2sAYdcqrNW

## Asosiy URL

https://api.example.com/

markdown


## Avtorizatsiya

API dan foydalanish uchun avtorizatsiya zarur. Har bir so'rovda `Authorization` sarlavhasi orqali API kalitini yuboring:

Authorization: Bearer YOUR_API_KEY

markdown


## Endpointlar

### 1. Foydalanuvchi ma'lumotlarini olish

**URL:** `/users/{id}`

**Metod:** `GET`

**Tavsif:** Berilgan `id` ga ega foydalanuvchi ma'lumotlarini qaytaradi.

**So'rov sarlavhalari:**

Authorization: Bearer YOUR_API_KEY Content-Type: application/json


**Javob:**

```json
{
  "id": 1,
  "ism": "Ali",
  "familiya": "Valiyev",
  "email": "ali@example.com"
}
Izoh: Agar foydalanuvchi topilmasa, 404 Not Found xatosi qaytariladi.

2. Yangi foydalanuvchi yaratish
URL: /users

Metod: POST

Tavsif: Yangi foydalanuvchi yaratadi.

So'rov sarlavhalari:


Authorization: Bearer YOUR_API_KEY
Content-Type: application/json
So'rov tanasi:


{
  "ism": "Ali",
  "familiya": "Valiyev",
  "email": "ali@example.com",
  "parol": "123456"
}
Javob:


{
  "id": 2,
  "ism": "Ali",
  "familiya": "Valiyev",
  "email": "ali@example.com"
}
Izoh: Agar email allaqachon mavjud bo'lsa, 409 Conflict xatosi qaytariladi.

3. Foydalanuvchi ma'lumotlarini yangilash
URL: /users/{id}

Metod: PUT

Tavsif: Berilgan id ga ega foydalanuvchi ma'lumotlarini yangilaydi.

So'rov sarlavhalari:

Authorization: Bearer YOUR_API_KEY
Content-Type: application/json
So'rov tanasi:

{
  "ism": "Ali",
  "familiya": "Valiyev",
  "email": "ali_new@example.com"
}
Javob:

{
  "id": 1,
  "ism": "Ali",
  "familiya": "Valiyev",
  "email": "ali_new@example.com"
}
Izoh: Agar foydalanuvchi topilmasa, 404 Not Found xatosi qaytariladi.

4. Foydalanuvchini o'chirish
URL: /users/{id}

Metod: DELETE

Tavsif: Berilgan id ga ega foydalanuvchini o'chiradi.

So'rov sarlavhalari:

Authorization: Bearer YOUR_API_KEY
Content-Type: application/json
Javob: 204 No Content

Izoh: Agar foydalanuvchi topilmasa, 404 Not Found xatosi qaytariladi.

Xatolik kodlari
400 Bad Request: Noto'g'ri so'rov.
401 Unauthorized: Avtorizatsiya muvaffaqiyatsiz.
403 Forbidden: Ruxsat etilmagan amal.
404 Not Found: Resurs topilmadi.
500 Internal Server Error: Serverdagi xatolik.
