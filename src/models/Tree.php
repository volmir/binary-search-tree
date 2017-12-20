<?php

namespace PVV\models;

use PVV\helpers\TreeVisitor;
 
/** 
* Class Tree
* @package PVV\models
*/
class Tree {

    /**
     * Tree
     */
    public $left;

    /**
     * Tree
     */
    public $right;

    /**
     * int
     */
    public $key;
    
    /**
     * 
     * @param int $k
     */
    public function __construct(int $k = 0) {
        $this->key = $k;
    }

    /**
     * Добавление нового поддерева (ключа)
     * Сравнить ключ добавляемого поддерева (К) с ключом корневого узла (X).
     * Если K<X, рекурсивно добавить новое дерево в левое поддерево.
     * Если K>=X, рекурсивно добавить новое дерево в правое поддерево.
     * Если поддерева нет, то вставить на это место новое дерево
     * 
     * @param Tree $aTree
     */
    public function insert(Tree $aTree) {
        if ($aTree->key < $this->key) {
            if ($this->left != null) {
                $this->left->insert($aTree);
            } else {
                $this->left = $aTree;
            }
        } else {
            if ($this->right != null) {
                $this->right->insert($aTree);
            } else {
                $this->right = $aTree;
            }
        }
    }

    /**
     * Обход дерева
     * Рекурсивно обойти левое поддерево.
     * Применить функцию f() к корневому узлу.
     * Рекурсивно обойти правое поддерево.
     *  
     * @param TreeVisitor $visitor
     * @param int $pos
     */
    public function traverse(TreeVisitor $visitor, int $pos = 0) {
        if ($this->left != null) {
            $this->left->traverse($visitor, $pos + 1);
        }

        $visitor->visit($this, $pos);

        if ($this->right != null) {
            $this->right->traverse($visitor, $pos + 1);
        }
    }
}
