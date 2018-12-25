#### 目标开发一个PSR-0规范的框架

##### PSR-0规范

1、全部使用命名空间
2、所有PHP文件必须自动载入，不能有include/require
3、单一入口

```php
function __autoload($class){
    require __DIR__ . DIRECTORY_SEPARATOR . $class.'.php';
}
spl_autoload_register();
```

##### SPL标准库的使用

```php
// 栈的使用
$stack = new SplStack();
$stack->push('num1');
$stack->push('num2');
echo $stack->pop();
echo PHP_EOL;
echo $stack->pop();
echo PHP_EOL;
// 队列
$queue = new SplQueue();
// 堆
$heap = new SplMaxHeap();
//最小数组 SplFixArray
$arr = new SplFixedArray(10);
```

##### PHP链式操作的实现

```php
<?php
namespace Functions;

class Chain
{
    private $sql=array("from"=>"",
        "where"=>"",
        "order"=>"",
        "limit"=>"");

    public function from($tableName) {
        $this->sql["from"]="FROM ".$tableName;
        return $this;
    }

    public function where($_where='1=1') {
        $this->sql["where"]="WHERE ".$_where;
        return $this;
    }

    public function order($_order='id DESC') {
        $this->sql["order"]="ORDER BY ".$_order;
        return $this;
    }

    public function limit($_limit='30') {
        $this->sql["limit"]="LIMIT 0,".$_limit;
        return $this;
    }
    public function select($_select='*') {
        return "SELECT ".$_select." ".(implode(" ",$this->sql));
    }
}
$chain = new \Functions\Chain();
echo $chain->from("testTable")->where("id=1")->order("id DESC")->limit(10)->select();
```



#### PHP魔术方法的使用

PHP中的魔术方法总结 :construct, destruct , call, callStatic,get, set, isset, unset , sleep, wakeup, toString, set_state, clone and autoload

- get、set
  这两个方法是为在类和他们的父类中没有声明的属性而设计的
  get( $property ) 当调用一个未定义的属性时访问此方法
  set( $property, $value ) 给一个未定义的属性赋值时调用
  这里的没有声明包括当使用对象调用时，访问控制为proteced,private的属性（即没有权限访问的属性）

- isset、unset
  isset( $property ) 当在一个未定义的属性上调用isset()函数时调用此方法
  unset( $property ) 当在一个未定义的属性上调用unset()函数时调用此方法
  与get方法和set方法相同，这里的没有声明包括当使用对象调用时，访问控制为proteced,private的属性（即没有权限访问的属性）

- call
  call( $method, $arg_array ) 当调用一个未定义的方法是调用此访求
  这里的未定义的方法包括没有权限访问的方法

- autoload
  autoload 函数，它会在试图使用尚未被定义的类时自动调用。通过调用此函数，脚本引擎在 PHP 出错失败前有了最后一个机会加载所需的类。
  注意: 在 __autoload 函数中抛出的异常不能被 catch 语句块捕获并导致致命错误。

- construct、destruct
  construct 构造方法，当一个对象创建时调用此方法，使用此方法的好处是：可以使构造方法有一个独一无二的名称,无论它所在的类的名称是什么.这样你在改变类的名称时,就不需要改变构造方法的名称
  destruct 析构方法，PHP将在对象被销毁前（即从内存中清除前）调用这个方法
  默认情况下,PHP仅仅释放对象属性所占用的内存并销毁对象相关的资源.
  析构函数允许你在使用一个对象之后执行任意代码来清除内存.
  当PHP决定你的脚本不再与对象相关时,析构函数将被调用.
  在一个函数的命名空间内,这会发生在函数return的时候.
  对于全局变量,这发生于脚本结束的时候.如果你想明确地销毁一个对象,你可以给指向该对象的变量分配任何其它值.通常将变量赋值勤为NULL或者调用unset.

- clone
  PHP5中的对象赋值是使用的引用赋值，如果想复制一个对象则需要使用clone方法，在调用此方法是对象会自动调用clone魔术方法
  如果在对象复制需要执行某些初始化操作，可以在__clone方法实现

- toString 
  toString方法在将一个对象转化成字符串时自动调用，比如使用echo打印对象时
  如果类没有实现此方法，则无法通过echo打印对象，否则会显示：Catchable fatal error: Object of class test could not be converted to string in
  此方法必须返回一个字符串

  在PHP 5.2.0之前，toString方法只有结合使用echo() 或 print()时 才能生效。PHP 5.2.0之后，则可以在任何字符串环境生效（例如通过printf()，使用%s修饰符），但 不能用于非字符串环境（如使用%d修饰符）。从PHP 5.2.0，如果将一个未定义toString方法的对象 转换为字符串，会报出一个E_RECOVERABLE_ERROR错误。

- sleep、wakeup
  sleep 串行化的时候用
  wakeup 反串行化的时候调用
  serialize() 检查类中是否有魔术名称 sleep 的函数。如果这样，该函数将在任何序列化之前运行。它可以清除对象并应该返回一个包含有该对象中应被序列化的所有变量名的数组。
  使用 sleep 的目的是关闭对象可能具有的任何数据库连接，提交等待中的数据或进行类似的清除任务。此外，如果有非常大的对象而并不需要完全储存下来时此函数也很有用。
  相反地，unserialize() 检查具有魔术名称 wakeup 的函数的存在。如果存在，此函数可以重建对象可能具有的任何资源。
  使用 wakeup 的目的是重建在序列化中可能丢失的任何数据库连接以及处理其它重新初始化的任务。

- __set_state
  当调用var_export()时，这个静态 方法会被调用（自PHP 5.1.0起有效）。
  本方法的唯一参数是一个数组，其中包含按array(’property’ => value, …)格式排列的类属性。

- invoke
  当尝试以调用函数的方式调用一个对象时，invoke 方法会被自动调用。
  PHP5.3.0以上版本有效

- callStatic
  它的工作方式类似于 call() 魔术方法，callStatic() 是为了处理静态方法调用，
  PHP5.3.0以上版本有效
  PHP 确实加强了对 callStatic() 方法的定义；它必须是公共的，并且必须被声明为静态的。同样，__call() 魔术方法必须被定义为公共的，所有其他魔术方法都必须如此。

#### 基本设计模式

1、工厂模式，工厂方法或者类生成对象，而不是在代码中new
2、单利模式，使用某个类的对象仅允许创建一个
3、注册模式，全局共享和交换对象
4、适配器模式，可以将截然不同的函数接口封装成统一的API
​    实例应用举例，PHP的数据库操作有mysql、mysqli、pdo3种，可以用适配器模式统一成一致，类似的场景还有cache
5、策略模式
​    将一组特定的行为和算法封装成类，以适应某些特定的上下文环境，这种模式就是策略模式
​    实际应用举例，假如一个电商网站系统，针对男性女性用户要各自跳转到不同的商品类型，并且所有广告位展示不同的广告

```php
$page = new \Functions\Page();
if($_GET['gender']=='nan'){
    $strategy = new \Functions\Strategy\MaleUserStrategy();
} else {
    $strategy = new \Functions\Strategy\FemaleUserStrategy();
}
$page->setStategy($strategy);
$page->index();

```

​	使用策略模式可以实现IOC，依赖倒置、控制反转

6、数据对象映射模式
​    是将对象和数据存储映射起来，对一个对象的操作会映射为对数据存储的操作
​    在代码中实现数据对象

7、观察者模式
​    当一个对象状态发生改变时，依赖它的对象全部会收到通知，并自动更新
​    场景：一个事件发生后，要执行

```php
 class Event extends \Functions\EvenGenerator{
        function trigger(){
            echo "Event<br/>";
            $this->notify();
        }
  }
 class Observer1 implements \Functions\Observer{
    function update($event_info = null)
    {
        echo "逻辑1<br/>\n";
    }
}
class Observer2 implements \Functions\Observer{

    function update($event_info = null)
    {
        echo "逻辑2<br/>\n";
    }
}
$event = new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->trigger();
```

8、原型模式
​    与工厂模式作用类似，都是用来创建对象
​    与工厂模式的实现不同，原型模式是先创建好一个原型对象，然后通过clone原型来创建新的对象。这样就免去了类创建时重复的初始化操作
​    原型模式适用于大对象的创建。创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可

```php
$canvas = new \Functions\Canvas();
$canvas->init();
$can1 = clone $canvas;
$can1->draw();
$can2 = clone $canvas;
$can2->draw();
```

9、装饰器模式
​    装饰器模式，可以动态的添加修改类的功能
​    一个类提供了一项功能，如果要在修改病添加额外的功能，传统的编辑模式，需要写一个子类继承它，并重新实现类的方法
​    使用装饰器模式，仅需要运行时添加一个装饰器对象即可实现，可以实现最大的灵活性
10、迭代器模式
​    在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素
​    相比与传统的变成模式，迭代器模式可以隐藏遍历元素的所需的操作
​    implements Iterator
11、代理模式
​    在客户端与实体之间建立一个代理对象，客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节
​    代理对象还可以与业务代码分离 ，部署到另外的服务器。业务代码中通过RPC来委派任务
​    

##### 面向对象编程的基本原则

1、单一职责
​    一个类，只需要做好一件事情
2、开放封闭
​    一个类，应该是可扩展的，而不可修改的
3、依赖倒置
​    一个类，不应该强依赖另外一个类。每个类对于另外一个类都是可替换的
4、配置化
​    尽可能地使用配置，而不是硬编码
5、面向接口编程
​    只需要关心接口，不需要关心实现
​    
MVC结构
​    模型-视图-控制器，一种C/S或者B/S软件工程的组织方式
​    model:数据和存储的封装
​    视图：展现层的封装
​    控制器：逻辑层的封装
​    

##### 配置与设计模式

- PHP中使用ArrayAccess实现配置文件的加载

  ```php
  $config = new \configs\Config(BASEDIR.'/configs');
  var_dump($config['controller']);
          
  ```

- 在工厂方法中读取配置，生成可配置化的对象

- 使用装饰器模式实现权限验证，模板渲染，json串化

- 使用观察者模式实现数据更新事件的一系列更新操作
  ​    新员工入职
  ​        开启OA
  ​        分配办公区
  ​        分配电脑
- 使用代理模式实现数据库的主从自动切换 