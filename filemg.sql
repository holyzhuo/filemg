-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 10 日 14:09
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `filemg`
--
CREATE DATABASE `filemg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `filemg`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL auto_increment,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(6, 'admin', 'da19e5eb2264b28dbdcc01ca3f314c27');

-- --------------------------------------------------------

--
-- 表的结构 `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(10) unsigned NOT NULL auto_increment COMMENT '主键索引',
  `division_name` varchar(20) NOT NULL COMMENT '部门',
  PRIMARY KEY  (`division_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, '教务处'),
(2, '宣传部'),
(3, '院办'),
(5, '党办'),
(6, '人事处'),
(7, '纪委'),
(8, '学工处'),
(9, '工会'),
(10, '党组'),
(11, '科研处');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int(4) unsigned NOT NULL auto_increment COMMENT 'ID主键',
  `file_title` varchar(50) NOT NULL COMMENT '文件名',
  `division_id` int(4) unsigned NOT NULL COMMENT '所属部门',
  `file_donum` varchar(30) NOT NULL COMMENT '文号',
  `file_litime` date NOT NULL COMMENT '行文时间',
  `file_uperson` varchar(20) NOT NULL COMMENT '上传人员',
  `file_retime` date NOT NULL COMMENT '上传时间',
  `file_ori` varchar(255) NOT NULL COMMENT '文件路径',
  `file_remark` text NOT NULL COMMENT '文件摘要',
  `file_snum` int(10) NOT NULL default '0' COMMENT '访问次数',
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`file_id`, `file_title`, `division_id`, `file_donum`, `file_litime`, `file_uperson`, `file_retime`, `file_ori`, `file_remark`, `file_snum`) VALUES
(33, '关于做好2016年河池学院教学成果奖申报工作的通知', 2, '校才学[2015]11号', '2016-04-07', 'admin', '2016-04-10', 'uploadfile/2016041008/570a1374923c86.41167726.pdf', '关于做好2016年河池学院教学成果奖申报工作的通知内容', 1),
(32, '116号关于公布课堂教学模式改革项目立项评审结果的通知', 2, '校政发[2015]116号', '2016-04-04', 'admin', '2016-04-10', 'uploadfile/2016041008/570a138e92d7e6.86874227.pdf', '116号关于公布课堂教学模式改革项目立项评审结果的通知相关内容', 0),
(31, '12号河池学院关于做好2016年版人才培养方案修订工作的通知', 3, '校教学[2015]12号', '2016-05-03', 'admin', '2016-04-10', 'uploadfile/2016041008/570a13a1881f32.35031309.pdf', '12号河池学院关于做好2016年版人才培养方案修订工作的通知相关内容', 0),
(29, '河池学院本科主要教学环节质量标准', 1, '院教学[2009]29号', '2014-05-01', 'admin', '2016-04-10', 'uploadfile/2016041007/570a03fa6cbc62.89807301.pdf', '河池学院本科主要教学环节质量标准相关的内容', 0),
(30, '关于公布河池学院专业责任教授名单的通知 ', 1, '院政发[2015]60号', '2016-05-02', 'admin', '2016-04-09', 'uploadfile/2016041007/570a043a904045.46369732.pdf', '关于公布河池学院专业责任教授名单的通知 相关内容', 0),
(34, '河池学院关于开展课堂教学模式改革项目申报工作的通知', 1, '校教学[2015]8号', '2016-04-06', 'admin', '2016-04-10', 'uploadfile/2016041007/570a052eecf5e8.11790899.pdf', '河池学院关于开展课堂教学模式改革项目申报工作的通知内容', 0),
(35, '关于印发《河池学院青年教师教学能力提升百分行动计划》的通知', 1, '校教学[2015]9号', '2016-04-07', 'admin', '2016-04-10', 'uploadfile/2016041007/570a0563d3dca6.59221631.pdf', '关于印发《河池学院青年教师教学能力提升百分行动计划》的通知相关', 0),
(36, '关于对2014年新入职青年教师进行教学能力考核的通知', 1, '校教学[2015]10号', '2016-04-08', 'admin', '2016-04-10', 'uploadfile/2016041007/570a05911a2c92.36359063.pdf', '关于对2014年新入职青年教师进行教学能力考核的通知内容', 0),
(38, '关于印发《河池学院学习贯彻〈中国共产党廉洁自律准则〉和〈中国共产党纪律处分条例〉宣传工作方案》的通知', 5, '校党宣[2015]12号', '2016-04-11', 'admin', '2016-04-10', 'uploadfile/2016041008/570a13577a6473.77682861.pdf', '关于印发《河池学院学习贯彻〈中国共产党廉洁自律准则〉和〈中国共产党纪律处分条例〉宣传工作方案》的通知内容', 0),
(39, '10号关于开展河池学院2015年“12·4”全国法制宣传日系列活动的通知 ', 2, '校党宣[2015]10号', '2016-04-11', 'admin', '2016-04-10', 'uploadfile/2016041008/570a0f71a9bcf5.78469872.pdf', '10号关于开展河池学院2015年“12·4”全国法制宣传日系列活动的通知的文件', 0),
(40, '河池学院关于开展2016年春季学期开学检查工作的通知', 3, '校政办[2016]4号', '2016-04-12', 'admin', '2016-04-11', 'uploadfile/2016041008/570a0fa7c36562.98784164.pdf', '河池学院关于开展2016年春季学期开学检查工作的通知内容', 0),
(41, '河池学院关于2016年寒假放假的通知 ', 3, '院政办[2016]2号', '2016-04-13', 'admin', '2016-04-10', 'uploadfile/2016041008/570a0fdc87d475.13338330.pdf', '河池学院关于2016年寒假放假的通知的内容', 0),
(42, '关于召开2015年我校领导班子和领导干部年度考核测评会议的通知', 5, '校党办[2016]2号', '2016-04-14', 'admin', '2016-04-08', 'uploadfile/2016041008/570a102c9b03d3.57562357.pdf', '于召开2015年我校领导班子和领导干部年度考核测评会议的通知内容', 0),
(43, '关于转发《关于开好“三严三实”专题民主生活会的补充通知》的通知 ', 1, '校党发[2016]9号', '2016-04-15', 'admin', '2016-04-09', 'uploadfile/2016041008/570a1056c5d719.46115062.pdf', '关于转发《关于开好“三严三实”专题民主生活会的补充通知》的通知 内容', 0),
(44, '关于对处级干部任免审批表照片进行更新的通知', 5, '校党办[2016]1号', '2016-04-16', 'admin', '2016-04-07', 'uploadfile/2016041008/570a10990102b8.66358123.pdf', '关于对处级干部任免审批表照片进行更新的通知内容', 0);
