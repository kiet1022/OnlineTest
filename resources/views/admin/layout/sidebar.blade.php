<nav id="sidebar">
        <a href="{{route('get_admin_home_page')}}">
            <div class="sidebar-header text-center">
                <h4><strong>Welcome</strong><br><cite>{{Auth::user()->info->name}}</cite></h4>
            </div>
        </a>
            <ul class="list-unstyled components">
                <li>
                    <a href="#testMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý bài thi</a>
                    <ul class="collapse list-unstyled" id="testMenu">
                        <li>
                            <a href="{{route('get_test_list')}}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_new_test_from_bank')}}">Thêm bài thi từ ngân hàng</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_new_test')}}">Thêm bài thi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#questionMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý câu hỏi</a>
                    <ul class="collapse list-unstyled" id="questionMenu">
                        <li>
                            <a href="{{route('get_questions_types_list')}}">Chủ đề</a>
                        </li>
                        <li>
                            <a href="{{route('get_question_list')}}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_new_question')}}">Thêm câu hỏi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#memberMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý người dùng</a>
                    <ul class="collapse list-unstyled" id="memberMenu">
                        <li>
                            <a href="{{route('get_user_list')}}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_user')}}">Thêm người dùng</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#newsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý tin tức</a>
                    <ul class="collapse list-unstyled" id="newsMenu">
                        <li>
                            <a href="{{route('get_news_type_list')}}">Danh sách loại tin</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_news_type')}}">Thêm loại tin</a>
                        </li>
                        <li>
                            <a href="{{route('get_news_list')}}">Danh sách tin tức</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_news')}}">Thêm tin tức</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#statisticMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thống kê</a>
                    <ul class="collapse list-unstyled" id="statisticMenu">
                        <li>
                            <a href="{{route('get_test_statistic')}}">Thống kê bài thi</a>
                        </li>
{{--                         <li>
                            <a href="{{route('get_add_new_test_from_bank')}}">Thêm bài thi từ ngân hàng</a>
                        </li>
                        <li>
                            <a href="{{route('get_add_new_test')}}">Thêm bài thi</a>
                        </li> --}}
                    </ul>
                </li>
{{--                 <li>
                    <a href="#">Quản lý diễn đàn</a>
                </li> --}}
            </ul>

<!--             <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->
        </nav>