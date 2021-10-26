
<footer class="footer footer-light @if(isset($configData['footerType'])){{$configData['footerClass']}}@endif" style="padding: 0px;">
<div class="m-0">
        <div class="disable-rounded-right mb-0 p-2 d-flex flex-column justify-content-center" style="
    background-image: url({{asset('images/backgrounds/footer-image.png')}});
    background-size: contain;
    background-repeat: no-repeat;
    background-position: right;        padding: 1.4rem 2.5em !important;
">
          <p><strong>Trần Thành Danh & Huỳnh Trung Thành</strong><br>
         Khoa Công Nghệ Thông Tin- Tác chiến Không Gian Mạng,
          Lớp DHCN5, Trường Đại học Thông tin Liên lạc<br>
          <strong>DĐ&nbsp;&nbsp;&nbsp;&nbsp;</strong>    0925516991       <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SĐT&nbsp;&nbsp;&nbsp;&nbsp;</strong>   (058)3 123 123
          <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FP&nbsp;&nbsp;&nbsp;&nbsp;</strong>    <span style="text-transform:none !important;">www.facebook.com</span><br>
        </p>
          

        </div>
      </div>


  @if($configData['isScrollTop'] === true)
  <button class="btn btn-primary btn-icon scroll-top" type="button" style="display: inline-block;">
  <i class="bx bx-up-arrow-alt"></i>
  </button>
  @endif
</footer>

