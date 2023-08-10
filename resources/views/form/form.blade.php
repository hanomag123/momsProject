<div class="container main-block-form">
  <div class="form-container">
      <h2 class="h3 form-title">@lang('messages.form.write')</h2>
      <form action="#" class="form-container__form mail-form">
          @csrf
          <div class="input-wrapper">
              <input type="text" name="name" class="input form-container__input" required>
              <div class="input-placeholder">@lang('messages.form.name')</div>
          </div>
          <div class="input-wrapper">
              <input type="tel" name="tel" class="input form-container__input" required>
              <div class="input-placeholder">@lang('messages.form.tel')</div>
          </div>

          <label class="input-checkbox-wrapper">
              <input type="checkbox" required>
              <span class="input-checkbox"><svg>
                      <use href='#checkboxIcon'></use>
                  </svg></span>
              <span class="text-3 form-agreetext">@lang('messages.form.confirm')<button type="button" class="page-link" data-modal="#policy">@lang('messages.form.politic')</button>.</span>
          </label>

          <button class="page-button">@lang('messages.form.button')</button>
      </form>
  </div>
</div>