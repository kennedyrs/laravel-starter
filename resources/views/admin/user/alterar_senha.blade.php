<div class="modal fade" id="modal-alterar-senha" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
        <h4 class="modal-title">Alterar minha senha</h4>
      </div>
      <form class="form-group" method="POST" action="{{ route('admin.user.update.password', ['id'=>Auth::user()->id]) }}">
            @csrf
          <div class="modal-body">
              <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label for="password">Senha</label>
                  <input id="password" name="password" type="password" class="form-control input-lg" required autofocus minlength="6" autocomplete="off">
                  @if ($errors->has('password'))
                      <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</span>
                  @endif
              </div>
              <div class="form-group">
                  <label for="password-confirm">Confirme a Senha</label>
                  <input id="password-confirm" name="password_confirmation" type="password" class="form-control input-lg" required autofocus minlength="6" autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{__('admin.fechar')}}</button>
            <button type="submit" class="btn btn-primary">{{__('admin.salvar')}}</button>
          </div>
      </form>
    </div>
  </div>
</div>
