# ایجاد اسنیپت‌های

برای ایجاد **اسنیپت‌های سفارشی در VSCode** (مثلاً برای HTML)، مراحل زیر را دنبال کنید. این مراحل به شما کمک می‌کنند تا با استفاده از کلیدهای ترکیبی `Shift + Ctrl + P` (در ویندوز) یا `Shift + Cmd + P` (در مک)، یک اسنیپت جدید برای زبان HTML ایجاد کنید.

---

### مراحل کامل:

#### 1. باز کردن Command Palette:
- کلیدهای ترکیبی `Shift + Ctrl + P` (ویندوز) یا `Shift + Cmd + P` (مک) را بزنید.
- یک منوی بالای صفحه باز می‌شود که به آن **Command Palette** می‌گویند.

---

#### 2. جستجوی Configure User Snippets:
- در Command Palette، عبارت **"Configure User Snippets"** را تایپ کنید.
- گزینه‌ای با همین نام ظاهر می‌شود. روی آن کلیک کنید.

---

#### 3. انتخاب زبان (HTML):
- پس از انتخاب **"Configure User Snippets"**، لیستی از زبان‌ها نمایش داده می‌شود.
- از این لیست، **"HTML"** را انتخاب کنید. این کار یک فایل به نام `html.json` را باز می‌کند.

---

#### 4. ویرایش فایل `html.json`:
- فایل `html.json` برای تعریف اسنیپت‌های سفارشی HTML استفاده می‌شود.
- در این فایل، می‌توانید اسنیپت‌های خود را به صورت JSON اضافه کنید. برای مثال:

```json
{
  "Example Snippet": {
    "prefix": "html-example",
    "body": [
      "<!DOCTYPE html>",
      "<html lang=\"en\">",
      "<head>",
      "    <meta charset=\"UTF-8\">",
      "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">",
      "    <title>${1:Title}</title>",
      "</head>",
      "<body>",
      "    ${2:Content}",
      "</body>",
      "</html>"
    ],
    "description": "یک مثال ساده از اسنیپت HTML"
  }
}
```

---

#### 5. ذخیره فایل:
- پس از ویرایش فایل `html.json`، آن را ذخیره کنید (`Ctrl + S` یا `Cmd + S`).

---

#### 6. استفاده از اسنیپت:
- حالا در هر فایل HTML، می‌توانید از اسنیپت خود استفاده کنید.
- مثلاً عبارت **`html-example`** را تایپ کنید و سپس **`Tab`** یا **`Enter`** را بزنید.
- کد اسنیپت به صورت خودکار در فایل شما قرار می‌گیرد.

---

### مثال عملی:
اگر اسنیپت زیر را به `html.json` اضافه کنید:

```json
"Bootstrap Starter Template": {
  "prefix": "bs5-starter",
  "body": [
    "<!DOCTYPE html>",
    "<html lang=\"en\">",
    "<head>",
    "    <meta charset=\"UTF-8\">",
    "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">",
    "    <title>${1:Title}</title>",
    "    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">",
    "</head>",
    "<body>",
    "    ${2:Content}",
    "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>",
    "</body>",
    "</html>"
  ],
  "description": "یک قالب شروع‌کننده با Bootstrap 5"
}
```

با تایپ **`bs5-starter`** و زدن **`Tab`**، یک قالب HTML با Bootstrap 5 به صورت خودکار ایجاد می‌شود.

---

### نکات مهم:
- **`prefix`**: عبارت کوتاهی است که برای فراخوانی اسنیپت استفاده می‌شود.
- **`body`**: محتوای اسنیپت که به صورت خودکار درج می‌شود.
- **`description`**: توضیحی کوتاه درباره اسنیپت.

اگر سوالی دارید یا نیاز به کمک بیشتری دارید، خوشحال می‌شوم کمک کنم! 


### چند نمونه دیگر
```json
{
  "Popular Frameworks CDN": {
    "prefix": "cdn-frameworks",
    "body": [
      "<!-- Bootstrap 5.3.3 -->",
      "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">",
      "<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>",
      "",
      "<!-- jQuery -->",
      "<script src=\"https://code.jquery.com/jquery-3.7.1.min.js\"></script>",
      "",
      "<!-- Tabler CSS و آیکون‌ها -->",
      "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/css/tabler.min.css\">",
      "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css\">",
      "",
      "<!-- Font Awesome 6 -->",
      "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">",
      "",
      "<!-- Tailwind CSS -->",
      "<script src=\"https://cdn.tailwindcss.com\"></script>",
      "",
      "<!-- Alpine.js -->",
      "<script defer src=\"https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js\"></script>"
    ],
    "description": "افزودن لینک‌های CDN برای فریم‌ورک‌های معروف (Bootstrap, jQuery, Tabler, Font Awesome, Tailwind, Alpine.js)"
  }
}
```

---

```json
{
  "Tabler CDN Setup": {
    "prefix": "tabler-cdn",
    "body": [
      "<!-- لینک Tabler CSS -->",
      "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0/dist/css/tabler.min.css\">",
      "",
      "<!-- لینک Tabler Icons -->",
      "<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css\">"
    ],
    "description": "افزودن لینک‌های CDN برای Tabler CSS و Tabler Icons"
  }
}
```
