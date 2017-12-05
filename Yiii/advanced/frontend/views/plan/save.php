<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}
ul{ list-style: none}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
.right li{
    margin-top: 20px;
}
.right span{
    display: inline-block;
    width: 200px;
    line-height: 40px;
    height: 40px;
    text-align: right;
    margin-right: 20px;
}

.right .filed_name{
    width: 300px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}
.right .filed_value{
    width: 300px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}




.right .length{
    width: 140px;
    line-height: 40px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
}

.submit{
    width: 150px;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    border: 1px solid #ddd;
    display: inline-block;
    background: rgba(14, 196, 210, 0.99);
    color: #fff;
    text-align: center;
    margin-left: 200px;
    margin-top: 20px;
}
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>
<?php

    use yii\helpers\Url;

?>
<div class="left">
    <ul>
        <li><a href="<?php echo Url::to(['plan/index'])?>">查看注册字段</a></li>
        <li><a href="<?php echo Url::to(['plan/add'])?>">添加注册字段</a></li>
        <li><a href="<?php echo Url::to(['plan/update'])?>">修改注册字段</a></li>

    </ul>
</div>

<div class="right">
    <div class="search-box">
        <form action="<?php echo Url::to(['plan/save'])?>" method="post">
            <input type="hidden" name="filed_id" value="<?=$data['filed_id']?>">
            <ul> 

                <li>
                    <span>请输入字段名称：</span>
                    <input class="filed_name" type="text" name="filed_name" value="<?=$data['filed_name']?>">
                </li>
                <li>
                    <span>请输入字段默认值：</span>
                    <input class="filed_value" type="text" name="filed_value" value="<?=$data['filed_value']?>">
                </li>
                <li>
                    <span>请选择字段类型：</span>
                    <?php if($data['filed_type'] == 'input-text'){?>
                    <select name="filed_type">
                        <option value="input-text" selected>文本框</option>
                        <option value="input-radio">单选框</option>
                        <option value="input-password">密码框</option>
                        <option value="textarea">文本域</option>
                    </select>
                    <?php } ?>
                     <?php if($data['filed_type'] == 'input-radio'){?>
                    <select name="filed_type">
                        <option value="input-text" >文本框</option>
                        <option value="input-radio" selected>单选框</option>
                        <option value="input-password">密码框</option>
                        <option value="textarea">文本域</option>
                    </select>
                      <?php } ?>
                     <?php if($data['filed_type'] == 'input-password'){?>
                    <select name="filed_type">
                        <option value="input-text" >文本框</option>
                        <option value="input-radio">单选框</option>
                        <option value="input-password" selected>密码框</option>
                        <option value="textarea">文本域</option>
                    </select>
                       <?php } ?>
                     <?php if($data['filed_type'] == 'textarea'){?>
                    <select name="filed_type">
                        <option value="input-text" >文本框</option>
                        <option value="input-radio" >单选框</option>
                        <option value="input-password">密码框</option>
                        <option value="textarea" selected>文本域</option>
                    </select>
                       <?php } ?>
                </li>
                <li>
                    <span>是否必填：</span>
                    <?php if($data['filed_if'] == '1'){?>
                    <input type="checkbox" value="1" name="filed_if" checked>必填
                    <?php }else{?>
                    <input type="checkbox" value="1" name="filed_if" >必填
                    <?php }?>
                
                </li>
                <li>
                    <span>请选择验证规则：</span>
                    <?php if($data['filed_rule'] =='wu') {?>
                    <select name="filed_rule" id="">
                        <option value="wu" selected>无</option>
                        <option value="phone">手机号码</option>
                        <option value="length">长度</option>
                    </select>
                       <?php } ?>
                    <?php if($data['filed_rule'] =='phone') {?>
                    <select name="filed_rule" id="">
                        <option value="wu" >无</option>
                        <option value="phone" selected>手机号码</option>
                        <option value="length">长度</option>
                    </select>
                       <?php } ?>
                    <?php if($data['filed_rule'] =='length') {?>
                    <select name="filed_rule" id="">
                        <option value="wu" >无</option>
                        <option value="phone">手机号码</option>
                        <option value="length"  selected>长度</option>
                    </select>
                       <?php } ?>
                </li>
                <li>
                    <span>请选择填写长度范围：</span>
                    <input  type="text"  placeholder="请输入最小长度" class="length" name="filed_min" value="<?=$data['filed_min']?>">
                    ~
                    <input  type="text"  placeholder="请输入最大长度" class="length" name="filed_max" value="<?=$data['filed_max']?>">
                </li>
                <li>
                 <input type="submit" name="" value="修改" class="submit">
                </li>
            </ul>
        </form>
    </div>
</div>