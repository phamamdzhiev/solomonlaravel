{{--THIS IS EMAIL TEMPLATE FOR NEW ORDER--}}
<div>
    <h1>Нова поръчка</h1>
    <br />
    <ul>
        <li>Име: {{$name}}</li>
        <li>Мобилен: {{$mobile}}</li>
        <li>Имейл: {{$email}}</li>
        <li>Количество: {{$qnt}}</li>
        <li>Продукт: {{$prodID}}</li>
        <li>Адрес: {{$address}}</li>
        <li>Дата: {{date("Y-m-d H:i:s", strtotime('+3 hours'))}}</li>
    </ul>
</div>
