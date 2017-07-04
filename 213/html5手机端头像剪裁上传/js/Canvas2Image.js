(function _mergeImage2Canvas() {
    // 获取file上传和展现的图片。一般file上传之后，有个小图标展现。
    var imgs = $(".img_files");
    if (!imgs) {
        return false;
    }

    // 创建原始图像
    // 原因：file上传之后，展现往往是个缩略图，无法取到真正大小
    for (var i = 0; i < imgs.length; i++) {
        var fbwImg   = document.createElement("img");
        var fbwImgID = "temp_img_id" + i;
        $("#" + fbwImgID).remove();
        fbwImg.src   = imgs[i].src;
        fbwImg.className     = "temp-img-class";
        // 不显示，仅供调用
        fbwImg.style.display = "none";

        // 临时区域扩展
        $("#temp_section").append(fbwImg);
    }

    // 合并原始图片，生成一个新的base64 图片
    var getOriginImgBase64 = function (oriImgs) {
        if (!oriImgs) {
            return false;
        }

        // 获取canvas的宽高
        // 原因：canvas需要首先指定宽高，所以需要提前获取最终的宽高
        var maxWidth = 0;
        var height = 0;
        for (var i = 0; i < oriImgs.length; i++) {
            var img = oriImgs[i];
            if (img.width > maxWidth) {
                maxWidth = img.width;
            }
            height += img.height;
        }

        // 设定canvas
        var canvas    = document.createElement("canvas");
        canvas.width  = maxWidth + 10;
        canvas.height = height + 10;
        var ctx       = canvas.getContext("2d");

        // 留5margin
        var dheight = 5;
        for (var j = 0; j < oriImgs.length; j++) {
            var img     = oriImgs[j];
            var cheight = img.height;
            var cwidth  = img.width;

            // 留5 margin
            ctx.drawImage(img, 5, dheight, cwidth, cheight);

            dheight = dheight + cheight + 5;
        }

        // 生成的base64 放在需要的一个全局变量中。
        fbw_img_data = canvas.toDataURL('image/png');

        // 清理
        $(".temp_img_class").remove();
    };

    // 之所以使用timer，考虑到dom树如果没有加载完成，会取到高度有误差
    var imgTimer = null;
    imgTimer = setTimeout(function () {
        getOriginImgBase64($(".temp_img_class"));

        if (imgTimer) {
            clearTimeout(imgTimer);
        }
    }, 300);
})();
