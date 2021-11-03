<!-- BEGIN: Footer-->

<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span class="right hide-on-small-only">&copy; 2021 <a href="http://www.fabrica.lv" target="_blank">fabrica.IT SIA</a> {{ trans('locale.footertext') }}
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->