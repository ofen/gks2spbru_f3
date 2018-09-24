<h4>Интернет приемная</h4>
<form method="post" action="/reception">
    <!-- Field -->
    <div class="form-group">
        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="ФИО">
    </div>
    <!-- Field -->
    <div class="form-group">
        <input type="text" name="address" class="form-control" id="address" placeholder="Ваш адрес">
    </div>
    <!-- Field -->
    <div class="form-group">
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Ваш номер телефона">
    </div>
    <!-- Field -->
    <div class="form-group">
        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail адрес">
    </div>
    <!-- Field -->
    <div class="form-group">
        <select name="subject" class="form-control" id="subject">
            <option disabled selected hidden>Выберите тему</option>
            <option>Обращение</option>
            <option>Пожелание</option>
            <option>Заявление</option>
            <option>Благодарность</option>
            <option>Претензия</option>
            <option>Жалоба</option>
            <option>Другое</option>
        </select>
    </div>
    <!-- Field -->
    <div class="form-group">
        <textarea name="body" class="form-control" id="body" rows="3" placeholder="Введите текст сообщения"></textarea>
    </div>
    <!-- Field -->
    <div class="form-group">
        <input type="file" name="attachment" class="form-control">
    </div>
    <!-- Button -->
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>