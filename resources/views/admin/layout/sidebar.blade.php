<nav id="sidebar">
            <div class="sidebar-header text-center">
                <h4><strong>Welcome</strong><br><cite>Dương Tuấn Kiệt</cite></h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#testMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý bài thi</a>
                    <ul class="collapse list-unstyled" id="testMenu">
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                        <li>
                            <a href="#">Thêm bài thi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#questionMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý câu hỏi</a>
                    <ul class="collapse list-unstyled" id="questionMenu">
                        <li>
                            <a href="#">Danh sách</a>
                        </li>
                        <li>
                            <a href="#">Thêm câu hỏi</a>
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
                    <a href="#">Quản lý diễn đàn</a>
                </li>
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