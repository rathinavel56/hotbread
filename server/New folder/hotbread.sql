/*
Navicat MySQL Data Transfer

Source Server         : locahost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : hotbread

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-13 10:39:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `recipe_categories`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_categories`;
CREATE TABLE `recipe_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_categories
-- ----------------------------
INSERT INTO `recipe_categories` VALUES ('1', 'FG', '1', '2021-10-25 02:18:23', '2021-10-25 02:34:38');
INSERT INTO `recipe_categories` VALUES ('2', 'SFG', '1', '2021-10-25 02:18:23', '2021-10-26 05:54:12');

-- ----------------------------
-- Table structure for `recipe_ingredients`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_ingredients`;
CREATE TABLE `recipe_ingredients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_ingredients
-- ----------------------------
INSERT INTO `recipe_ingredients` VALUES ('1', 'Bread Improver', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:51');
INSERT INTO `recipe_ingredients` VALUES ('2', 'Dry Yeast', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:51');
INSERT INTO `recipe_ingredients` VALUES ('3', 'G S Margarine', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:51');
INSERT INTO `recipe_ingredients` VALUES ('4', 'Gluten', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:00');
INSERT INTO `recipe_ingredients` VALUES ('5', 'Refined Flour (Maida)', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:08');
INSERT INTO `recipe_ingredients` VALUES ('6', 'Milk Powder', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:15');
INSERT INTO `recipe_ingredients` VALUES ('7', 'Salt', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:26');
INSERT INTO `recipe_ingredients` VALUES ('8', 'Sugar', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:34');
INSERT INTO `recipe_ingredients` VALUES ('9', 'Water - Bubble Top', '1', '2021-10-26 05:59:24', '2021-10-26 06:25:08');
INSERT INTO `recipe_ingredients` VALUES ('10', 'Butter - Salted, Amul', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:33');
INSERT INTO `recipe_ingredients` VALUES ('11', 'Baking Powder', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:44');
INSERT INTO `recipe_ingredients` VALUES ('12', 'Container - Brownie', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:49');
INSERT INTO `recipe_ingredients` VALUES ('13', 'Butter Paper', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:53');
INSERT INTO `recipe_ingredients` VALUES ('14', 'Dark Compound - Morde', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:58');
INSERT INTO `recipe_ingredients` VALUES ('15', 'Eggs', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:06');
INSERT INTO `recipe_ingredients` VALUES ('16', 'Icing Sugar', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:29');
INSERT INTO `recipe_ingredients` VALUES ('17', 'Walnut', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:51');
INSERT INTO `recipe_ingredients` VALUES ('18', 'Capsicum', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_ingredients` VALUES ('19', 'Cheese - Mozzarella', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_ingredients` VALUES ('20', 'Onion', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_ingredients` VALUES ('21', 'Tomato', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_ingredients` VALUES ('22', 'Tomato Sauce - CB', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');

-- ----------------------------
-- Table structure for `recipe_recipes`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_recipes`;
CREATE TABLE `recipe_recipes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `yield` double(20,5) NOT NULL,
  `unit_id` int(2) NOT NULL,
  `is_ingredient` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_recipes
-- ----------------------------
INSERT INTO `recipe_recipes` VALUES ('1', 'Bun Dough', '1.80000', '2', '0', '1', null, '2021-10-26 05:55:33');
INSERT INTO `recipe_recipes` VALUES ('2', 'Brownie', '24.00000', '4', '0', '1', null, '2021-10-26 06:23:14');
INSERT INTO `recipe_recipes` VALUES ('3', 'Bun - Veg Pizza', '1.00000', '4', '0', '1', null, '2021-10-26 21:33:23');

-- ----------------------------
-- Table structure for `recipe_recipe_ingredients`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_recipe_ingredients`;
CREATE TABLE `recipe_recipe_ingredients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `recipe_id` bigint(20) NOT NULL,
  `parent_recipe_id` bigint(20) NOT NULL DEFAULT '0',
  `recipe_ingredient_id` varchar(500) NOT NULL DEFAULT '0',
  `unit_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `quantity` double(20,5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_recipe_ingredients
-- ----------------------------
INSERT INTO `recipe_recipe_ingredients` VALUES ('1', '1', '0', '1', '2', '2', '0.01000', '1', '2021-10-26 05:59:24', '2021-10-26 06:05:37');
INSERT INTO `recipe_recipe_ingredients` VALUES ('2', '1', '0', '2', '2', '2', '0.01000', '1', '2021-10-26 05:59:24', '2021-10-26 06:05:43');
INSERT INTO `recipe_recipe_ingredients` VALUES ('3', '1', '0', '3', '2', '2', '0.05000', '1', '2021-10-26 05:59:24', '2021-10-26 06:08:51');
INSERT INTO `recipe_recipe_ingredients` VALUES ('4', '1', '0', '4', '2', '2', '0.00500', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:00');
INSERT INTO `recipe_recipe_ingredients` VALUES ('5', '1', '0', '5', '2', '2', '1.05000', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:08');
INSERT INTO `recipe_recipe_ingredients` VALUES ('6', '1', '0', '6', '2', '2', '0.05000', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:15');
INSERT INTO `recipe_recipe_ingredients` VALUES ('7', '1', '0', '7', '2', '2', '0.02000', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:26');
INSERT INTO `recipe_recipe_ingredients` VALUES ('8', '1', '0', '8', '2', '2', '0.08000', '1', '2021-10-26 05:59:24', '2021-10-26 06:09:34');
INSERT INTO `recipe_recipe_ingredients` VALUES ('9', '1', '0', '9', '3', '2', '0.75000', '1', '2021-10-26 05:59:24', '2021-10-26 06:25:08');
INSERT INTO `recipe_recipe_ingredients` VALUES ('10', '2', '0', '10', '2', '1', '0.16000', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:33');
INSERT INTO `recipe_recipe_ingredients` VALUES ('11', '2', '0', '11', '2', '1', '0.02000', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:44');
INSERT INTO `recipe_recipe_ingredients` VALUES ('12', '2', '0', '12', '4', '1', '24.00000', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:49');
INSERT INTO `recipe_recipe_ingredients` VALUES ('13', '2', '0', '13', '4', '1', '0.50000', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:53');
INSERT INTO `recipe_recipe_ingredients` VALUES ('14', '2', '0', '14', '2', '1', '0.80000', '1', '2021-10-26 05:59:24', '2021-10-26 06:26:58');
INSERT INTO `recipe_recipe_ingredients` VALUES ('15', '2', '0', '15', '4', '1', '12.00000', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:06');
INSERT INTO `recipe_recipe_ingredients` VALUES ('16', '2', '0', '3', '2', '1', '0.45000', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:12');
INSERT INTO `recipe_recipe_ingredients` VALUES ('17', '2', '0', '16', '2', '1', '0.37500', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:29');
INSERT INTO `recipe_recipe_ingredients` VALUES ('18', '2', '0', '5', '2', '1', '0.37500', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:45');
INSERT INTO `recipe_recipe_ingredients` VALUES ('19', '2', '0', '17', '2', '1', '0.30000', '1', '2021-10-26 05:59:24', '2021-10-26 06:27:51');
INSERT INTO `recipe_recipe_ingredients` VALUES ('20', '3', '1', '0', '2', '1', '0.08000', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('21', '3', '0', '18', '2', '1', '0.02000', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('22', '3', '0', '19', '2', '1', '0.01000', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('23', '3', '0', '3', '2', '1', '0.00500', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('24', '3', '0', '5', '2', '0', '0.00500', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('25', '3', '0', '20', '2', '0', '0.02500', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('26', '3', '0', '21', '2', '0', '0.02000', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');
INSERT INTO `recipe_recipe_ingredients` VALUES ('27', '3', '0', '22', '2', '0', '0.00500', '1', '2021-10-26 05:59:24', '2021-10-26 05:59:24');

-- ----------------------------
-- Table structure for `recipe_units`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_units`;
CREATE TABLE `recipe_units` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `units` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_units
-- ----------------------------
INSERT INTO `recipe_units` VALUES ('1', 'g');
INSERT INTO `recipe_units` VALUES ('2', 'kg');
INSERT INTO `recipe_units` VALUES ('3', 'Ltr');
INSERT INTO `recipe_units` VALUES ('4', 'pieces');

-- ----------------------------
-- Table structure for `recipe_users`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_users`;
CREATE TABLE `recipe_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_users
-- ----------------------------
INSERT INTO `recipe_users` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for `recipe_user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `recipe_user_groups`;
CREATE TABLE `recipe_user_groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recipe_user_groups
-- ----------------------------
INSERT INTO `recipe_user_groups` VALUES ('1', 'super admin ');
INSERT INTO `recipe_user_groups` VALUES ('2', 'admin');
