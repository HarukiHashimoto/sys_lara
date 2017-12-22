// デスクトップ通知

$('.save_btn').on('click', notification);

function notification() {
    console.log("noti");
    var options = {
        body : "CT-Learn",
        icon : '/sys_lara/public/image/favicon/48.png'
    }
    // Notification.requestPermission();   //  通知許可
    var n = new Notification("Save Your Model!!!",options);
    // タイムアウト設定
    setTimeout(n.close.bind(n), 5000);
};
