<?php
/**
 * User: 郭玉朝
 * CreateTime: 2018/10/13 下午8:47
 * Description:
 */
namespace app\blog\cron;
use app\blog\service\ToolService;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Exception;
use tool\MyRedis;

class VisitNumCron extends Command
{
    protected function configure()
    {
        $this->setName('VisitNumCron')->setDescription("");
    }

    protected function execute(Input $input, Output $output)
    {
        $times = 0;
        while (true) {
            // 从队列拿出需要增加的id
            $visit = MyRedis::instance()->lPop('tool_visit');
            if ($visit) {
                try {
                    ToolService::instance()->addVisitNum($visit);
                } catch (Exception $e) {
                    MyRedis::instance()->rPush('tool_visit', $visit);
                }
            }
            if ($times%5 === 0) sleep(1);
            $times++;
        }
    }

}