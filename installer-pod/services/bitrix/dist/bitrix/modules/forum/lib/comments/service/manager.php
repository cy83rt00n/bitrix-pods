<?php

namespace Bitrix\Forum\Comments\Service;

class Manager
{
	const TYPE_TASK_INFO = 1;
//	const TYPE_TASK_CREATED = 2;

	public static function getTypesList()
	{
		return [
			static::TYPE_TASK_INFO,
//			static::TYPE_TASK_CREATED
		];
	}

	final public static function find(array $params = [])
	{
		$commentType = (isset($params['SERVICE_TYPE']) ? (int)$params['SERVICE_TYPE'] : 0);

		if ($commentType <= 0)
		{
			return false;
		}

		switch ($commentType)
		{
			case static::TYPE_TASK_INFO:
				$result = new TaskInfo();
				break;
//			case static::TYPE_TASK_CREATED:
//				$result = new TaskCreated();
//				break;
			default:
				$result = false;
		}

		return $result;
	}
}