## Nova 刷新列表界面面板

### 安装

```
composer require curder/nova-refresh-toolbar
```


### 配置

在 `App\Providers\NovaServiceProvider`文件的 `tools`方法添加组件的调用。

```
/**
 * Get the tools that should be listed in the Nova sidebar.
 *
 * @return array
 */
public function tools()
{
    return [
		\Curder\NovaRefreshToolbar\NovaRefreshToolbar::make()
	];
}
```

默认列表页面的头部右侧新增按钮处会添加刷新按钮。

如果有的资源不需要的话可以在对应的Resource类中添加一个静态属性。

```
/* 不展示列表页面刷新按钮 */
public static $indexRefreshToolBar = false;
```

