@extends('layouts.main')
@push('title')
    <title>Home Page</title>
@endpush
@section('content')
    <main>
        <section>
            <div class="container">
                <header>
                    <h1>Về 4S Design</h1>
                    <div class="intro-text">
                        <p>Cùng chung niềm đam mê và khát khao tạo ra những không gian kiến trúc tiện nghi và tinh tế.
                            Chúng tôi (đội ngũ 4S), những người có chuyên môn lẫn kinh nghiệm trong lĩnh vực thiết kế và thi
                            công các công trình kiến trúc – nội thất với châm ngôn <span class="highlight">không ngừng nỗ lực</span>
                            để...</p>
                    </div>
                </header>
                {{--            Phần main--}}
                <div class="services">
                    <div class="service-card">
                        <div class="service-image speedy-image"></div>
                        <div class="service-content">
                            <h2 class="service-title">Speedy – Nhanh Chóng</h2>
                            <p class="service-description">
                                Tư vấn và đưa ra giải pháp phù hợp bởi 4S luôn đặt khách hàng lên hàng đầu. Với hơn 6
                                năm hoạt động trong lĩnh vực thiết kế và thi công các công trình kiến trúc và nội thất, đội
                                ngũ 4S đã xây dựng được hình ảnh trong mắt khách hàng bằng quy trình làm việc chuyên nghiệp
                                và nhanh chóng từ khâu tư vấn khảo sát, lên bàn vẽ 2D – 3D cho đến thi công và nghiệm thu
                                bàn giao công trình.
                            </p>
                        </div>
                    </div>


                    <div class="service-card">
                        <div class="service-image style-image"></div>
                        <div class="service-content">
                            <h2 class="service-title">Style – Phong Cách</h2>
                            <p class="service-description">
                                Tạo ra một bản thiết kế độc đáo phù hợp với phong cách sống của khách hàng thông qua việc
                                lắng nghe và thấu hiểu những chia sẻ của khách hàng kết hợp với kỹ năng sáng tạo của người
                                thiết kế từ đó hiện thực nên một không gian sống hạnh phúc cho chính người sống bên trong.
                            </p>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image style-image"></div>
                        <div class="service-content">
                            <h2 class="service-title">Style – Phong Cách</h2>
                            <p class="service-description">
                                Tạo ra một bản thiết kế độc đáo phù hợp với phong cách sống của khách hàng thông qua việc
                                lắng nghe và thấu hiểu những chia sẻ của khách hàng kết hợp với kỹ năng sáng tạo của người
                                thiết kế từ đó hiện thực nên một không gian sống hạnh phúc cho chính người sống bên trong.
                            </p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image style-image"></div>
                        <div class="service-content">
                            <h2 class="service-title">Style – Phong Cách</h2>
                            <p class="service-description">
                                Tạo ra một bản thiết kế độc đáo phù hợp với phong cách sống của khách hàng thông qua việc
                                lắng nghe và thấu hiểu những chia sẻ của khách hàng kết hợp với kỹ năng sáng tạo của người
                                thiết kế từ đó hiện thực nên một không gian sống hạnh phúc cho chính người sống bên trong.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection



