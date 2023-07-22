
<section>
  <div class="main-block">
      <div class="main-block-left container">
          <h1 class="main-block-title text-white">@lang('messages.main-block.title')</h1>
          <div class="main-block-text text-white">@lang('messages.main-block.intro')</div>
      </div>
      <div class="main-block-right img-cover">
          <img src="/images/main/main-1.jpg" alt="main">
      </div>
  </div>

  <div class="container main-block-form">
      <div class="form-container">
          <h2 class="h3 form-title">Напишите нам!</h2>
          <form action="#" class="form-container__form">
              <div class="input-wrapper">
                  <input type="text" name="name" class="input form-container__input" required>
                  <div class="input-placeholder">Имя и фамилия</div>
              </div>
              <div class="input-wrapper">
                  <input type="tel" name="tel" class="input form-container__input" required>
                  <div class="input-placeholder">Телефон</div>
              </div>

              <label class="input-checkbox-wrapper">
                  <input type="checkbox" required>
                  <span class="input-checkbox"><svg>
                          <use href='#checkboxIcon'></use>
                      </svg></span>
                  <span class="text-3 form-agreetext">Согласен на обработку персональных данных, получение рассылок, а
                      также <br>с <button type="button" class="page-link" data-modal="#policy">Политикой
                          конфиденциальности</button>.</span>
              </label>

              <button class="page-button">Оставить заявку</button>
          </form>
      </div>
  </div>
</section>
