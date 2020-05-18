@section('footer')

    <footer>
        <div class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-links">
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <h3>リンク</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-md-12">
                                <p><a class="scroll-link" href="/">ホーム</a></p>
                                <p><a href="https://twitter.com/Koutei_108" target="_blank">お問い合わせ（作者Twitter）</a></p>
                                <p><a href="{{url('/privacy-policy')}}">プライバシーポリシー</a></p>
                                <p><a href="{{url('/terms')}}">利用規約</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 footer-copyright">
                    © 2020 Koutei
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    @yield('pageJs')
@endsection
