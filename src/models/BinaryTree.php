<?php

namespace Tree\models;

use Tree\helpers\ITreeVisitor;
 
/** 
 * 
 * Class BinaryTree
 */
class BinaryTree {

    /**
     * BinaryTree
     */
    public $left;

    /**
     * BinaryTree
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
     * Сравнить ключ добавляемого поддерева (К) с ключом корневого узла (X):
     *  - Если K<X, рекурсивно добавить новое дерево в левое поддерево.
     *  - Если K>=X, рекурсивно добавить новое дерево в правое поддерево.
     * 
     * @param BinaryTree $aTree
     */
    public function insert(BinaryTree $aTree) {
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
     * Проверяем, есть ли узел с ключом K в дереве Т
     * Сравниваем K со значением ключа корневого узла X:
     *  - Если K=X, выдать ссылку на этот узел и остановиться
     *  - Если K<X, рекурсивно искать ключ K в левом поддереве Т
     *  - Если K>X, рекурсивно искать ключ K в правом поддереве Т
     * 
     * @param int $key
     * @param ITreeVisitor $visitor
     */
    public function find($key, ITreeVisitor $visitor) {
        if ($key == $this->key) {
            $visitor->visit($this);
            return;
        }
        if ($key < $this->key && $this->left != null) {
            $visitor->visit($this);
            $this->left->find($key, $visitor);
        }
        if ($key > $this->key && $this->right != null) {
            $visitor->visit($this);
            $this->right->find($key, $visitor);
        }
    } 

    /**
     * Удаление вершины с ключем К и всех её потомков
     * 
     * @param int $key
     */    
    public function remove(int $key) {
        if ($this->left != null && $key == $this->left->key) {
            $this->left = null;
            return;
        }
        if ($this->right != null && $key == $this->right->key) {
            $this->right = null;
            return;
        }        

        if ($key < $this->key && $this->left != null) {
            $this->left->remove($key);
        }
        if ($key > $this->key && $this->right != null) {
            $this->right->remove($key);
        }
    }     
    
    /**
     * Обход дерева (INFIX_TRAVERSE, элементы по возрастанию):
     *  - Рекурсивно обойти левое поддерево
     *  - Применить функцию f() к корневому узлу
     *  - Рекурсивно обойти правое поддерево
     *  
     * @param ITreeVisitor $visitor
     * @param int $pos
     */
    public function traverse(ITreeVisitor $visitor, int $pos = 0) {
        if ($this->left != null) {
            $this->left->traverse($visitor, $pos + 1);
        }

        $visitor->visit($this, $pos);

        if ($this->right != null) {
            $this->right->traverse($visitor, $pos + 1);
        }
    }
    
    /**
     * Нахождение вершины с минимальным значением ключа
     * 
     * @param ITreeVisitor $visitor
     */
    public function minimum(ITreeVisitor $visitor) {
        if ($this->left != null) {
            $this->left->minimum($visitor);
        } else {
            $visitor->visit($this);
        }
    }

    /**
     * Нахождение вершины с максимальным значением ключа
     * 
     * @param ITreeVisitor $visitor
     */
    public function maximum(ITreeVisitor $visitor) {
        if ($this->right != null) {
            $this->right->maximum($visitor);
        } else {
            $visitor->visit($this);
        }
    }
       
}
