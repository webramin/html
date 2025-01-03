# اطلاعات بازیگران

این پروژه یک برنامه وب است که اطلاعات بازیگران ایرانی را نمایش می‌دهد. کاربران می‌توانند با استفاده از این برنامه، اطلاعاتی مانند نام، سال تولد و وضعیت فعالیت بازیگران را جستجو و مشاهده کنند.

## ساختار پروژه

پروژه شامل فایل‌های زیر است:

- `index.html`: صفحه HTML اصلی که شامل ساختار و استایل برنامه است.
- `actorspro.json`: فایل JSON که اطلاعات بازیگران را در خود ذخیره کرده است.
- `actors.text`: فایل متنی که حاوی اطلاعات اضافی در مورد بازیگران است.

## نحوه استفاده

1. صفحه `index.html` را در مرورگر خود باز کنید.
2. از طریق فیلد جستجو، نام بازیگر مورد نظر خود را وارد کنید.
3. نتایج جستجو به صورت لیستی از نام‌های بازیگران نمایش داده می‌شود.
4. با کلیک بر روی نام هر بازیگر، اطلاعات کامل او نمایش داده می‌شود.

## تکنولوژی‌های مورد استفاده

- HTML
- CSS
- JavaScript (jQuery)
- JSON

## نحوه اجرا

برای اجرای این برنامه، کافی است فایل `index.html` را در مرورگر خود باز کنید. این فایل به طور خودکار داده‌های بازیگران را از `actorspro.json` بارگیری کرده و نمایش می‌دهد.

## مثال کد

```html
<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <title>اطلاعات بازیگران</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://webramin.github.io/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://webramin.github.io/font/iransans/iran-sans.css">
    <script src="https://webramin.github.io/js/jquery-3.7.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>اطلاعات بازیگران</h1>
        <input type="text" id="search" class="form-control" placeholder="جستجو...">
        <div id="search-results" class="list-group mt-3"></div>
        <div id="actors" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function() {
            let actorsData = [];

            $.getJSON('actorspro.json')
            .done(function(data) {
                actorsData = data;
            })
            .fail(function(jqxhr, textStatus, error) {
                console.error('Error fetching the actors data:', textStatus, error);
            });

            $('#search').on('input', function() {
                const searchValue = $(this).val().toLowerCase();
                if (searchValue) {
                    displaySearchResults(searchValue);
                } else {
                    $('#search-results').empty();
                }
            });

            $(document).on('click', '.search-result-item', function() {
                const actorName = $(this).data('actorName');
                $('#search').val('');
                $('#search-results').empty();
                displayActorInfo(actorName);
            });

            function displaySearchResults(searchValue) {
                const filteredActors = actorsData.filter(actor =>
                    actor.name.toLowerCase().includes(searchValue)
                );
                let resultsHTML = '';
                filteredActors.forEach(actor => {
                    resultsHTML += `<a href="#" class="list-group-item list-group-item-action search-result-item" data-actor-name="${actor.name}">${actor.name}</a>`;
                });
                $('#search-results').html(resultsHTML);
            }

            function displayActorInfo(actorName) {
                const actor = actorsData.find(actor => actor.name === actorName);
                if (actor) {
                    const age = calculateAge(actor.birthYear);
                    const actorHTML = `
                    <div class="card">
                    <img src="img/${actor.image}" class="card-img-top" alt="${actor.name}">
                    <div class="card-body">
                    <h5 class="card-title">${actor.name}</h5>
                    <p class="card-text">${actor.birthYear} - ${age} سال</p>
                    <p class="card-text">وضعیت: ${actor.status}</p>
                    </div>
                    </div>`;
                    $('#actors').html(actorHTML);
                }
            }

            function calculateAge(birthDateString) {
                const [birthYear, birthMonth, birthDay] = birthDateString.split('/').map(Number);
                const currentYear = getCurrentShamsiYear();
                const today = new Date();
                const currentMonth = today.getMonth() + 1;
                const currentDay = today.getDate();

                let age = currentYear - birthYear;
                if (birthMonth > currentMonth || (birthMonth === currentMonth && birthDay > currentDay)) {
                    age--;
                }

                return age;
            }

            function getCurrentShamsiYear() {
                const today = new Date();
                const day = today.getDate();
                const month = today.getMonth() + 1;
                let year = today.getFullYear();
                year -= ((month < 3) || ((month === 3) && (day < 21))) ? 622: 621;
                return year;
            }
        });
    </script>
</body>
</html>
```

## مشارکت

برای مشارکت در این پروژه، می‌توانید درخواست‌های پول (Pull Request) خود را از طریق GitHub ارسال کنید. همچنین، در صورت وجود هرگونه سؤال یا مشکل، می‌توانید از طریق بخش Issues با ما در ارتباط باشید.
