// Lấy hàm createApp từ thư viện Vue
const { createApp } = Vue;

// Tạo ứng dụng Vue
createApp({
    // Khai báo dữ liệu
    data() {
        return {
            student: {
                studentId: "23001933",
                fullName: "Mai Đình Thành",
                className: "K68A4 - Khoa học máy tính và thông tin",
                avatar: "img//avatar.jpg",
                averageScore: "7.9",
                isStudying: true
            },

            // Mặc định ẩn phần giới thiệu
            showIntroduction: false
        }
    }
}).mount("#app")