# Hệ Thống Quản Lý Công Việc

Dự án này là một hệ thống quản lý công việc, cho phép người dùng tạo, xem, cập nhật, và xoá các công việc. Ứng dụng được xây dựng bằng PHP, Bootstrap, và JavaScript. Dưới đây là các chức năng được triển khai trong hệ thống:

## Mục Lục

1. [Trang Chủ](#home-page)
2. [Thêm Mới Công Việc](#add-new-task)
3. [Xem và Quản Lý Công Việc](#view-and-manage-tasks)
4. [Cập Nhật Công Việc](#update-task)

## 1. Trang Chủ

Trang chủ liên kết đến các trang con của ứng dụng, như trang thêm công việc mới, xem danh sách công việc, và cập nhật công việc.

## 2. Thêm Mới Công Việc

Trang thêm mới công việc cho phép người dùng tạo một công việc mới. Các tính năng sau đã được triển khai:

- **Kiểm Tra Dữ Liệu:** Form sử dụng kiểm tra JavaScript để đảm bảo tất cả các trường bắt buộc đều được nhập trước khi gửi.

## 3. Xem và Quản Lý Công Việc

Trang xem và quản lý công việc cung cấp một cái nhìn tổng quan về tất cả các công việc và cho phép người dùng thực hiện các hành động sau:

- **Tìm Kiếm:** Người dùng có thể tìm kiếm các công việc theo tên hoặc mô tả.
- **Lọc:** Người dùng có thể lọc các công việc dựa trên trạng thái của chúng, như các công việc sắp hết hạn, các công việc đã hoàn thành, và các công việc đang thực hiện.
- **Xem Chi Tiết:** Người dùng có thể xem chi tiết một công việc trên một trang riêng.
- **Xoá:** Người dùng có thể xoá một hoặc nhiều công việc. Chức năng xoá cũng bao gồm xử lý lỗi khi loại công việc bị tham chiếu bởi các công việc khác.
- **Cập Nhật Trạng Thái:** Người dùng có thể cập nhật trạng thái của một công việc trực tiếp từ danh sách.
- **Quản Lý Danh Mục:** Người dùng có thể quản lý danh mục các loại công việc.

## 4. Cập Nhật Công Việc

Trang cập nhật công việc cho phép người dùng chỉnh sửa một công việc hiện có. Trang này tự động điền trước nội dung của công việc đã chọn.

Sau khi cập nhật, hệ thống sẽ chuyển hướng người dùng trở lại trang danh sách công việc.

## Cách Chạy

Để chạy dự án này, làm theo các bước sau:

1. Clone hoặc tải xuống repository của dự án.
2. Thiết lập một môi trường máy chủ cục bộ hoặc từ xa để chạy PHP (như XAMPP, WAMP, MAMP, hoặc máy chủ trên đám mây).
3. Nhập cấu trúc cơ sở dữ liệu và dữ liệu mẫu.
4. Mở ứng dụng trong trình duyệt web.
