//dom加载完成后执行的js
;
(function ($) {
    // 设置eacoo-tab的宽度
    $('.eacoo-tab').width($(window).width()-373);
    
    // 打开新Tab
    $('body').delegate('a.opentab', 'click', function() {
        var tab_url   = $(this).attr('href');
        var tab_name  = $(this).attr('tab-name');
        var tab_title = $(this).attr('tab-title');
        var is_iframe = $(this).data('iframe');//true|false
        var tab_html = $(this).html();
        //标题替换
        if (tab_title) {
            tab_html = tab_html.replace($(this).text(),tab_title);
        }
        tab_html+='<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        
        //设置最新latest_iframe_tab存储
        var latest_iframe_tab = {tab_name:tab_name,tab_url:tab_url,tab_html:tab_html};
        localStorage.setItem('latest_iframe_tab',JSON.stringify(latest_iframe_tab));

        showTabIframe(latest_iframe_tab,is_iframe);
        return false;
    });
    // 给Bootstrap标签切换增加关闭功能
    $('body').on('click', '.eacoo-tab-wrap .close', function() {
        var id = $(this).closest('a[data-toggle="tab"]').attr('href');
        if(id) {
            // 删除前先显示前一个tab
            if ($(id).hasClass('active')) {
                var prevLi = $(this).closest('li').prev();
                prevLi.addClass('active');
                $(prevLi.find('a').attr('href')).removeClass('fade').addClass('active');
                //设置最新latest_iframe_tab存储
                
                var pre_id = prevLi.find('a').attr('href');
                var tab_name = pre_id.substr(1);
                var tab_url = $(pre_id + ' iframe').attr('src');
                var tab_html = prevLi.find('a').html();
                var latest_iframe_tab = {tab_name:tab_name,tab_url:tab_url,tab_html:tab_html};
                //console.log(latest_iframe_tab);
                //localStorage.removeItem("latest_iframe_tab");
                localStorage.setItem('latest_iframe_tab',JSON.stringify(latest_iframe_tab));
            }
            // 删除标签对应的内容
            if ($(id).remove()) {
                $(this).closest('li').remove();  // 删除标签
            };
        }
    });

    // 关闭标签时自动取消左侧导航的active状态
    $('body').delegate('.nav-close .close', 'click', function() {
        var id  = $(this).closest('a[data-toggle="tab"]').attr('href');
        var tab = id.split('#');
        $('a[tab-name="' + tab[1] + '"]').closest('li').removeClass('active');

    });

    // 关闭所有标签
    $('body').delegate('.eacoo-tab-nav .close-all', 'click', function() {
        $('.new-add').remove();
        $('.eacoo-tab a:first').tab('show');
        localStorage.removeItem("latest_iframe_tab");
    });

    // 单击标签
    $('body').delegate('.eacoo-tab a', 'click', function() {
        var id = $(this).attr('href');
        var tab_name = id.substr(1);
        var tab_url = $(id + ' iframe').attr('src');
        if (tab_url) {
            var tab_html = $(this).html();
            var latest_iframe_tab = {tab_name:tab_name,tab_url:tab_url,tab_html:tab_html};
            //console.log(latest_iframe_tab);
            localStorage.setItem('latest_iframe_tab',JSON.stringify(latest_iframe_tab));
        }
        
    });

    // 双击刷新标签
    $('body').delegate('.eacoo-tab a', 'dblclick', function() {
        var id = $(this).attr('href');
        $(id+' .iframe').attr('src', $(id+' .iframe').attr('src'));
    });

    // TAB向左滚动
    $('body').delegate('#tab-left', 'click', function() {
        var left = $('.eacoo-tab').position().left;
        if (left < 0) {
            $('.eacoo-tab').animate({left:(left+480+'px')});
        }
    });

    // TAB向右滚动
    $('body').delegate('#tab-right', 'click', function() {
        var left = $('.eacoo-tab').position().left;
        if(($(window).width()-373)-(left+$('.eacoo-tab').width()) < 0){
            $('.eacoo-tab').animate({left:(left-480+'px')});
        }
    });

    // //窗口大小改变,修正主窗体最小高度
    // $(window).resize(function () {
    //     $(".iframe-wrapper").css("height", $(".content-wrapper").height() + "px");
    // });
    
    //侧边栏菜单点击状态转换
    $('body').on('click',".sidebar-menu>li.no_tree>a",function () {
        $('.sidebar-menu').find('li').removeClass('active');
        $(this).parent().addClass('active');
        $('.sidebar-menu').find('ul.treeview-menu').hide();
        //$.cookie('old_eacoo_pathname',pathname, { expires: 7, path: '/' });
    });
    $('body').on('click',".sidebar-menu .treeview-menu a",function () {
        $('.sidebar-menu').find('ul.treeview-menu li').removeClass('active');
        $(this).parent().addClass('active');
        
        //$.cookie('old_eacoo_pathname',pathname, { expires: 7, path: '/' });
    });
   
    //iframe打开
    $('body').on('click','[load-type=iframe]',function () {
        var target;
        var $this = $(this);
        var title = $(this).attr('title');
        if ((target = $(this).attr('href')) || (target = $(this).attr('url'))) {
            target = url(target,['load_type=iframe']);
            layer.open({
              type: 2,
              title: title,
              shadeClose: true,
              shade: 0.8,
              area: ['50%', '52%'],
              content:target, 
          });
        }
        return false;
    });

    //开启提示框
    $("[data-toggle='tooltip']").tooltip();

    //搜索功能
    $('body').on('click', '.search-btn', function() {
        var url = $(this).closest('form').attr('action');
        var query = $(this).closest('form').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/(^&)|(\+)/g, '');
        if (url.indexOf('?') > 0) {
            url += '&' + query;
        } else {
            url += '?' + query;
        }
        window.location.href = url;
        return false;
    });

     //回车搜索
    $(".search-input").keyup(function(e) {
        if (e.keyCode === 13) {
            $(".search-btn").click();
            return false;
        }
    });

  /*退出*/
  $('.loginout').click(function(){
      layer.confirm('确定要退出吗？', {icon: 3},function(){
          parent.layer.msg('退出成功!', {
            shift: 2,
            time: 1000,
            shade: [0.1,'#000'],
            end: function(){
              window.location.href = url("admin/index/logout");
            }
          });
      });

   });

    //全局配置
  layer.config({
      extend: [
          'extend/layer.ext.js' 
      ]
  });
})(jQuery);

/**
 * 刷新最新的iframe
 * @param  {[type]} param [description]
 * @return {[type]} [description]
 * @date   2018-02-08
 * @author 心云间、凝听 <981248356@qq.com>
 */
function refreshIframe(param) {
    var latest_iframe = JSON.parse(localStorage.getItem('latest_iframe_tab'));
    //console.log(latest_iframe_tab.tab_url);
    showTabIframe(latest_iframe);
}

/**
 * 置iframe
 * @param  {Boolean} is_from_iframe 是否来源框架的链接
 * @param  {[type]} iframe 对象
 * @date   2018-02-08
 * @author 心云间、凝听 <981248356@qq.com>
 */
function showTabIframe(iframe,is_from_iframe=false) {
    //设置打开对象
    var windowObj = window;
    if (is_from_iframe==true) {
        windowObj = windowObj.parent;
    }
    var tab_name = iframe.tab_name;
    var tab_url = iframe.tab_url;
    var tab_html = iframe.tab_html;

    var is_open   = windowObj.$('.eacoo-tab-content #' + tab_name).length;
    if(is_open !== 0){
        windowObj.$('.eacoo-tab a[href="#' + tab_name + '"]').tab('show');return true;
    } 

    var tab  = '<li class="new-add" style="position: relative;float:left;display: inline-block;"><a href="#'
             + tab_name
             + '" role="tab" data-toggle="tab">'
             + tab_html
             + '</a></li>';
    var tab_content = '<div role="tabpanel" class="new-add tab-pane fade" id="'
                    + tab_name
                    + '"><iframe name="#'
                    + tab_name
                    + '" id="iframe-'
                    + tab_name
                    + '" class="iframe" src="'
                    + tab_url
                    +'" ></iframe></div>';
    windowObj.$('.eacoo-tab').width(windowObj.$('.eacoo-tab').width() + 60);
    windowObj.$('.eacoo-tab').append(tab);
    windowObj.$('.eacoo-tab-content').append(tab_content);
    windowObj.$('.eacoo-tab a:last').tab('show');
    $("#"+tab_name+" iframe").load(function(){
        //var eacoo_tab_content_height = $('.eacoo-tab-content').height();
        //var mainheight = $(this).contents().find("body").height()+30;
        var mainheight = eacoo_tab_content_height+20;
        $(this).height(mainheight);
    });
}

/**
 * 加载侧边栏菜单
 * @return {[type]} [description]
 * @date   2018-02-12
 * @author 心云间、凝听 <981248356@qq.com>
 */
function loadSidebarMenus() {
    $.get(url("admin/index/getSidebarMenus")).success(function (result) {
        //console.log(result);
        var html = template("sidebar_menus", result);
        $("#sidebar-menus").html(html);
    })
    
}

/**
 * 加载顶部菜单
 * @return {[type]} [description]
 * @date   2018-02-12
 * @author 心云间、凝听 <981248356@qq.com>
 */
function loadTopMenus() {
    $.get(url("admin/index/getTopMenus")).success(function (result) {
        //console.log(result);
        var html = template("collect_top_menus", result);
        $("#top-collect-menus").html(html);
    })
    
}

/**************************附件选择器弹框 start*******************************/
//打开图片选择器组件
function openAttachmentLayer(obj) {
    var $this = $(obj);
    var layer_type = $this.data('type');if (!layer_type) layer_type = 2;
    var layer_title = $this.data('title');if (!layer_title) layer_title = '图片选择器';
    var layer_url = $this.data('url');if (!layer_url) layer_url = url('admin/upload/attachmentLayer');
    
    layer.open({
          type: layer_type,
          title: layer_title,
          shadeClose: true,
          shade: 0.8,
          area: ['70%', '82%'],
          content:layer_url, 
      });
}

/**
 * 设置附件输入框值
 * @param {[type]} inputName 输入框名
 * @param {[type]} ids       附件IDs
 * @param {[type]} srcs      附件SRCs
 */
function setAttachmentInputVal(inputName,ids,srcs) {
    if (ids.length>0 && srcs.length>0) {
        if(window.newSetAttachmentInputVal) {
            newSetAttachmentInputVal(inputName,ids,srcs);
        } else{
            $("#"+inputName).val(ids);
            $("#"+inputName).parent().find('.popup-gallery').html(
                  '<div class="each"><i onclick="admin_image.removeImage($(this),'+ids+')" class="fa fa-times-circle remove-attachment"></i><a href="'+ srcs+'" title="点击查看大图片"><img src="'+ srcs+'"></a><div class="text-center opacity del_btn" ></div></div>'
            );
        }
        
    }
    
    layer.closeAll('iframe');
}

//多图
/**
 * 设置附件多图值
 * @param {[type]} inputName [description]
 * @param {[type]} ids       [description]
 * @param {[type]} srcs      [description]
 */
function setAttachmentMultipleVal(inputName,ids,data) {
     //插入数据ids
    var field_ids=$("#"+inputName).val();    
    $("#"+inputName).val(field_ids+ids);

    $('#'+inputName+'-gallery-box').append(data);
    layer.closeAll('iframe');
}
/**************************附件选择器弹框 end*******************************/


admin_image ={
    /**
     *
     * @param obj
     * @param attachId
     */
    removeImage: function (obj, attachId) {
        // 移除附件ID数据
        this.upAttachVal('del', attachId, obj);
        obj.parents('.each').find('img').attr('src','/static/img/noimage.gif');
        obj.parents('.each').find('.remove-attachment').remove();
    },
    /**
     * 更新附件表单值
     * @return void
     */
    upAttachVal: function (type, attachId,obj) {
        var $attach_ids = obj.parents('.controls').find('.attach');
        var attachVal = $attach_ids.val();
        var attachArr = attachVal.split(',');
        var newArr = [];
        for (var i in attachArr) {
            if (attachArr[i] !== '' && attachArr[i] !== attachId.toString()) {
                newArr.push(attachArr[i]);
            }
        }
        type === 'add' && newArr.push(attachId);
        $attach_ids.val(newArr.join(','));
        return newArr;
    }
}