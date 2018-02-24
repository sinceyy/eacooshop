<?php
// 用户首页
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.eacoo123.com, All rights reserved.         
// +----------------------------------------------------------------------
// | [EacooPHP] 并不是自由软件,可免费使用,未经许可不能去掉EacooPHP相关版权。
// | 禁止在EacooPHP整体或任何部分基础上发展任何派生、修改或第三方版本用于重新分发
// +----------------------------------------------------------------------
// | Author:  心云间、凝听 <981248356@qq.com>
// +----------------------------------------------------------------------
namespace app\user\controller;
use app\home\controller\Home;

use app\common\model\User as UserModel;
class Index extends Home{
    function _initialize()
    {
        parent::_initialize();
        $this->userModel = new UserModel;
    }

    /*
     *  Description: 会员列表
     *  By: yyyvy  <QQ:76836785>
     *  Time: 2017-12-28 05:09:42
     * */
    public function index(){

        $map['status'] = 1; // 禁用和正常状态
        list($user_list,$page) = $this->userModel->getListByPage($map,'reg_time desc','uid,username,nickname,avatar,reg_time',20);
        $this->assign('user_list',$user_list);
        
        $this->pageInfo('会员列表','users');
        return $this->fetch();

    }

    /*
     *  Description: 会员主页
     *  By: yyyvy  <QQ:76836785>
     *  Time: 2017-12-28 06:55:11
     * */
    public function home($uid = 0){
        try {
            if ($uid>0) {
                $info = userModel::info($uid);
                $this->assign('info',$info);
                return $this->fetch();
            }
            throw new \Exception("用户ID不正确", 0);
            
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        
    }

    /*
     *  Description: 个人信息
     *  By: yyyvy  <QQ:76836785>
     *  Time: 2017-12-28 10:19:55
     * */
    public function personal(){
      if(is_login()) {
        return $this->fetch();
      }
      $this->error('未登录');
    }

    /*
     *  Description: 修改个人信息
     *  By: yyyvy  <QQ:76836785>
     *  Time: 2017-12-28 14:28:21
     * */
    public function profile() {
      if(is_login()){
        if (IS_POST) {
          $data = input('post.');
          // 提交数据

          $result = $this->userModel->editData($data,is_login(),'uid');

          if ($result) {
            $this->userModel->updateLoginSession(is_login());
            $this->success('提交成功', url('profile'));
          } else {
            $this->error($this->userModel->getError());
          }
        }else {
          // 获取账号信息
          $user_info = get_user_info(is_login());
          unset($user_info['password']);
          unset($user_info['auth_group']['max']);
          $this->assign('user_info',$user_info);
          return $this->fetch();
        }
      }
      $this->error('未登录');
    }
}
