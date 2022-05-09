[![jkOptionsFramework](https://s3.bmp.ovh/imgs/2022/05/07/0baef16c09b60f49.png)](https://www.ijkxs.com/)

# jkOptions Framework
一个适用于  Typecho 的主题和插件的 轻量级 简单 选项框架~

## Contents
- [Installation](#installation)
- [Demo](#demo)
- [Quick Start](#quick-start)
- [Documentation](#documentation)
- [Support](#support)
- [License](#license)


## Installation
[下载最新版本](https://github.com/gogobody/jkOptionsFramework/archive/refs/heads/main.zip)

上传自插件目录，并修改目录名为 jkOptionsFramework ，然后启用插件即可。

更多请请查看文档 [jkOptions Framework 在线文档](https://www.yuque.com/gogobody/wycinl/btgbxb#pYY55)

## Demo
插件设置自带一个展示Demo

## Quick Start

首先根据上面的内容安装插件

打开你的主题的 **functions.php** 然后粘贴以下代码.

```php
// Check core class for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  // 唯一的配置识别号
  $prefix = 'my_framework'; 

  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'My Framework',
    'menu_slug'  => 'my-framework',
  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 1',
    'fields' => array(

      // A text field
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'Simple Text',
      ),

    )
  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 2',
    'fields' => array(

      // A textarea field
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'Simple Textarea',
      ),

    )
  ) );

}
```
如何获取一个配置的值？
```php
$options = get_option( 'my_framework' ); // 唯一的识别号

echo $options['opt-text']; // 选项的id
echo $options['opt-textarea']; // 选项的id
```

## Documentation
阅读在线文档获取详细信息: [documentation](https://www.yuque.com/gogobody/wycinl/btgbxb)


## Available Option Fields
可用的选项字段如下：

| Accordion   | Color       | Icon         | Select   | Tabbed
|:------------|:------------|:-------------|:---------|:---
| Background  | Color Group | Image Select | Slider   | Text
| Backup      | Date        | Link Color   | Sortable | Textarea
| Border      | Dimensions  | Media        | Sorter   | Typography
| Button Set  | Fieldset    | Palette      | Spacing  | Upload
| Checkbox    | Gallery     | Radio        | Spinner  | Others
| Code Editor | Group       | Repeater     | Switcher | 

## Support

<img style="width: 40%" src="https://s3.bmp.ovh/imgs/2022/05/09/bcb038c19de72d6f.png" alt="">

### 赞赏记录

无
