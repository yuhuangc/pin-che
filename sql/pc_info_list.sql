/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : pinche

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-02-02 15:22:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pc_info_list
-- ----------------------------
DROP TABLE IF EXISTS `pc_info_list`;
CREATE TABLE `pc_info_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '拼车类型(1、车主 2、乘客)',
  `start_time` timestamp NOT NULL COMMENT '出发时间',
  `form_address` varchar(40) NOT NULL COMMENT '从哪里',
  `to_address` varchar(40) NOT NULL COMMENT '到哪里',
  `cost` varchar(20) DEFAULT NULL COMMENT '费用',
  `seat_num` int(11) DEFAULT NULL COMMENT '座位数',
  `car_type` varchar(20) DEFAULT NULL COMMENT '车型',
  `ways` varchar(50) DEFAULT NULL COMMENT '途径',
  `contact_name` varchar(20) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT '联系电话',
  `remark` varchar(400) DEFAULT NULL COMMENT '备注(对司机、乘客的要求等)',
  `is_top` int(11) DEFAULT '0' COMMENT '是否置顶(0、否 1、是)',
  `is_approve` int(11) DEFAULT '0' COMMENT '是否审核(0、未审核 1、已审核)',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `create_by` varchar(20) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='拼车信息表';
