## Nova 刷新列表界面面板

```
composer require curder/nova-refresh-toolbar
```

默认列表页面的头部右侧新增按钮处会添加刷新按钮。

如果有的资源不需要的话可以在对应的Resource类中添加一个静态属性。

```
/* 不展示列表页面刷新按钮 */
public static $indexRefreshToolBar = false;
```

