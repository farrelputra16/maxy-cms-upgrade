/*!
 * SurveyJS Creator v1.12.4
 * (c) 2015-2024 Devsoft Baltic OÜ - http://surveyjs.io/
 * Github: https://github.com/surveyjs/survey-creator
 * License: https://surveyjs.io/Licenses#SurveyCreator
 */
(function webpackUniversalModuleDefinition(root, factory) {
    if (typeof exports === "object" && typeof module === "object")
        module.exports = factory(
            require("survey-core"),
            require("survey-creator-core"),
            require("survey-knockout-ui"),
            require("knockout")
        );
    else if (typeof define === "function" && define.amd)
        define("survey-creator-knockout", [
            "survey-core",
            "survey-creator-core",
            "survey-knockout-ui",
            "knockout",
        ], factory);
    else if (typeof exports === "object")
        exports["survey-creator-knockout"] = factory(
            require("survey-core"),
            require("survey-creator-core"),
            require("survey-knockout-ui"),
            require("knockout")
        );
    else
        root["SurveyCreator"] = factory(
            root["Survey"],
            root["SurveyCreatorCore"],
            root["SurveyKnockout"],
            root["ko"]
        );
})(
    this,
    (
        __WEBPACK_EXTERNAL_MODULE_survey_core__,
        __WEBPACK_EXTERNAL_MODULE_survey_creator_core__,
        __WEBPACK_EXTERNAL_MODULE_survey_knockout_ui__,
        __WEBPACK_EXTERNAL_MODULE_knockout__
    ) => {
        return /******/ (() => {
            // webpackBootstrap
            /******/ "use strict";
            /******/ var __webpack_modules__ = {
                /***/ "./src/action-button.html":
                    /*!********************************!*\
  !*** ./src/action-button.html ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko ifnot: data.iconName-->
<!-- ko if: data.disabled-->
<span class="svc-action-button svc-action-button--disabled" data-bind="text:data.text, class: data.classes, attr: { title: data.title}"></span>
<!-- /ko -->
<!-- ko ifnot: data.disabled -->
<span role="button" class="svc-action-button" data-bind="text:data.text, click: onClick, key2click, attr: { title: data.title, 'aria-label': data.text }, class: data.classes, css:{'svc-action-button--selected':data.selected}"></span>
<!-- /ko -->
<!-- /ko -->

<!-- ko if: data.iconName-->
<!-- ko if: data.disabled -->
<sv-svg-icon class="svc-action-button svc-action-button--disabled svc-action-button--icon" data-bind="class: data.classes, attr: { title: data.title}" params="iconName: data.iconName, size: 24">
</sv-svg-icon>
<!-- /ko -->
<!-- ko ifnot: data.disabled -->
<sv-svg-icon class="svc-action-button svc-action-button--icon" data-bind="click: onClick, key2click, attr: { title: data.title, 'aria-label': data.text }, class: data.classes, css:{'svc-action-button--selected':data.selected}" params="iconName: data.iconName, size: 24">
</sv-svg-icon>
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/add-question-type-selector.html":
                    /*!*********************************************!*\
  !*** ./src/add-question-type-selector.html ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko with: \$data.questionTypeSelectorModel -->
<button type="button" data-bind="click: action, key2click, clickBubble: false, attr: { title: title, 'aria-label': title }" class="svc-element__question-type-selector">
  <sv-svg-icon class="svc-element__question-type-selector-icon" params="iconName: iconName, size: 24, title: title">
  </sv-svg-icon>
  <!-- ko if: \$parent.renderPopup -->
  <sv-popup params="model: popupModel"></sv-popup>
  <!-- /ko -->
</button>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/add-question.html":
                    /*!*******************************!*\
  !*** ./src/add-question.html ***!
  \*******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: 'svc-element__add-new-question ' + buttonClass, click: data.addNewQuestion, key2click, clickBubble: false, event: { mouseover: function(m, e) { data.hoverStopper && data.hoverStopper(e, \$element); }}">
  <!-- ko component: { name: 'sv-svg-icon', params: { css: 'svc-panel__add-new-question-icon', iconName: 'icon-add_24x24', size: 24 } } -->
  <!-- /ko -->
  <span class="svc-text svc-text--normal svc-text--bold" data-bind="text: data.addNewQuestionText">
  </span>
  <!-- ko if: \$data.renderPopup -->
  <!-- ko component: { name: "svc-add-question-type-selector", params: { questionTypeSelectorModel: data.questionTypeSelectorModel, renderPopup: renderPopup } } -->
  <!-- /ko -->
  <!-- /ko -->
</div>
<!-- ko ifnot: \$data.renderPopup -->
<!-- ko component: { name: "svc-add-question-type-selector", params: { questionTypeSelectorModel: data.questionTypeSelectorModel, renderPopup: renderPopup } } -->
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/cell-question-dropdown.html":
                    /*!**************************************************!*\
  !*** ./src/adorners/cell-question-dropdown.html ***!
  \**************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__adorner">
  <div class="svc-question__content svc-question__content--in-popup">

    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
    <!-- /ko -->

    <div class="svc-question__dropdown-choices">
      <!-- ko foreach: { data: question.visibleChoices, as: 'item' }  -->
      <div class="svc-question__dropdown-choice">
        <!-- ko component: { name: question.getItemValueWrapperComponentName(item), params: { componentData:  question.getItemValueWrapperComponentData(item), templateData: { name: 'survey-radiogroup-item', data: item } } } -->
        <!-- /ko -->
      </div>
      <!-- /ko -->
    </div>

  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/cell-question.html":
                    /*!*****************************************!*\
  !*** ./src/adorners/cell-question.html ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__adorner">
  <div class="svc-question__content svc-question__content--in-popup">

    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
    <!-- /ko -->

  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/image-item-value.html":
                    /*!********************************************!*\
  !*** ./src/adorners/image-item-value.html ***!
  \********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="event: { pointerdown: function(model, event) { return onPointerDown(event); } }, attr: attributes, css: getRootCss()">
  <div class="svc-image-item-value-wrapper__ghost" data-bind="style: getNewItemStyle()"></div>

  <div class="svc-image-item-value-wrapper__content">
    <input type="file" aria-hidden="true" tabindex="-1" class="svc-choose-file-input" data-bind="attr: { accept: acceptedTypes }">

    <!-- ko ifnot: isNew || isUploading -->
    <div class="svc-image-item-value__item">
      <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
      <!-- /ko -->
    </div>

    <!-- ko if: isDraggable && canRenderControls-->
    <sv-svg-icon class="svc-context-button svc-image-item-value-controls__drag-area-indicator" data-bind="event: { pointerdown: function(model, event) { onPointerDown(event); } }" params="iconName: 'icon-drag-area-indicator', size: 24">
    </sv-svg-icon>
    <!-- /ko -->

    <!-- ko if: canRenderControls-->
    <div class="svc-context-container svc-image-item-value-controls" data-bind="event: { pointerdown: blockEvent }">
      <!-- ko if: allowRemove && !isUploading -->
      <sv-svg-icon class="svc-context-button" data-bind="click: chooseFile, key2click" params="iconName: 'icon-file', size: 24, title: selectFileTitle" role="button"></sv-svg-icon>
      <sv-svg-icon class="svc-context-button svc-context-button--danger" data-bind="click: remove, key2click" params="iconName: 'icon-delete', size: 24, title: removeFileTitle" role="button"></sv-svg-icon>
      <!-- /ko -->
    </div>
    <!-- /ko -->
    <!-- /ko -->

    <!-- ko if: isNew || isUploading -->
    <div class="svc-image-item-value__item" data-bind="event: { dragover: dragover, drop: drop, dragleave: dragleave }">
      <div class="sd-imagepicker__item sd-imagepicker__item--inline">
        <label class="sd-imagepicker__label">
          <div data-bind="style: getNewItemStyle()" class="sd-imagepicker__image">
            <!-- ko if: isUploading -->
            <div class="svc-image-item-value__loading">
              <!-- ko component: { name: 'sv-loading-indicator' } -->
              <!-- /ko -->
            </div>
            <!-- /ko -->
          </div>
        </label>
      </div>
    </div>

    <div class="svc-image-item-value-controls" data-bind="event: { pointerdown: blockEvent }">
      <!-- ko if: allowAdd && !isUploading -->
      <sv-svg-icon class="svc-context-button svc-image-item-value-controls__add" data-bind="click: chooseNewFile, key2click, clickBubble: false" params="iconName: 'icon-add-lg', size: 24, title: addFileTitle">
      </sv-svg-icon>
      <!-- /ko -->
    </div>
    <!-- /ko -->
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/item-value.html":
                    /*!**************************************!*\
  !*** ./src/adorners/item-value.html ***!
  \**************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-item-value-wrapper" data-bind="event: { pointerdown: function (model, event) { onPointerDown(event); return true; } },attr: attributes, css: { 'svc-item-value--new': isNew, 'svc-item-value--dragging': isDragging, 'svc-item-value--ghost': isDragDropGhost, 'svc-item-value--movedown':isDragDropMoveDown, 'svc-item-value--moveup':isDragDropMoveUp }">
  <div class="svc-item-value__ghost"></div>
  <div class="svc-item-value-controls">
    <!-- ko if: isDraggable -->
    <span class="svc-item-value-controls__button svc-item-value-controls__drag">
      <sv-svg-icon class="svc-item-value-controls__drag-icon" params="iconName: 'icon-drag-area-indicator', size: 24, title: dragTooltip"></sv-svg-icon>
    </span>
    <!-- /ko -->
    <!-- ko if: allowAdd -->
    <sv-svg-icon class="svc-item-value-controls__button svc-item-value-controls__add" data-bind="click: add, key2click, attr: { 'aria-label': tooltip }" params="iconName: 'icon-add_16x16', size: 16, title: tooltip">
    </sv-svg-icon>
    <!-- /ko -->
    <!-- ko if: allowRemove -->
    <sv-svg-icon class="svc-item-value-controls__button svc-item-value-controls__remove" data-bind="click: remove, key2click, attr: { 'aria-label': tooltip }, event: { blur: koOnFocusOut }" params="iconName: 'icon-remove_16x16', size: 16, title: tooltip">
    </sv-svg-icon>
    <!-- /ko -->
  </div>

  <div class="svc-item-value__item" data-bind="click: select">
    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
    <!-- /ko -->
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/matrix-cell.html":
                    /*!***************************************!*\
  !*** ./src/adorners/matrix-cell.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-matrix-cell" tabindex="-1" data-bind="click: selectContext, event: { mouseover: function(m, e) { hover(e, \$element); }, mouseleave: function(m, e) { hover(e, \$element); } }">
  <div class="svc-matrix-cell--selected" data-bind="css: { 'svc-visible': isSelected }"></div>

  <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
  <!-- /ko -->

  <!-- ko if: \$data.isSupportCellEditor -->
  <div class="svc-matrix-cell__question-controls">
    <sv-svg-icon class="svc-matrix-cell__question-controls-button" data-bind="click: editQuestion, key2click" params="iconName: 'icon-edit', size: 24"></sv-svg-icon>
  </div>
  <!-- /ko -->

</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/panel.html":
                    /*!*********************************!*\
  !*** ./src/adorners/panel.html ***!
  \*********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__adorner" data-bind="css: rootCss(), attr: { 'data-sv-drop-target-survey-element': element.name || null }, event: { dblclick: (d, e) => dblclick(e), mouseover: function(m, e) { hover(e, \$element); }, mouseleave: function(m, e) { hover(e, \$element); } }">
  <!-- ko if: \$data.showHiddenTitle -->
  <div data-bind="css: \$data.cssCollapsedHiddenHeader">
    <div data-bind="css: \$data.cssCollapsedHiddenTitle">
      <!-- ko if: !!\$data.element.hasTitle -->
      <!-- ko template: { name: 'survey-string', data: \$data.element.locTitle } --><!-- /ko -->
      <!-- /ko -->
      <!-- ko ifnot: !!\$data.element.hasTitle -->
      <span class="svc-fake-title" data-bind="text: element.name"></span>
      <!-- /ko -->
    </div>
  </div>
  <!-- /ko -->
  <div data-bind="click: \$data.element.isInteractiveDesignElement ? koSelect : null, key2click: { disableTabStop: true }, clickBubble: false, css: css()">
    <div class="svc-question__drop-indicator svc-question__drop-indicator--left"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--right"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--top"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--bottom"></div>
    <!-- ko if: allowDragging && \$data.element.isInteractiveDesignElement -->
    <div class="svc-question__drag-area" data-bind="event: { pointerdown: (model, event)=>{ onPointerDown(event) } }">
      <!-- ko component: { name: 'sv-svg-icon', params: { css: 'svc-question__drag-element', iconName: 'icon-drag-area-indicator_24x16', size: 24 } } -->
      <!-- /ko -->
      <div class="svc-question__top-actions">
        <!-- ko component: { name: 'sv-action-bar', params: { model: topActionContainer, handleClick: false } } -->
        <!-- /ko -->
      </div>
    </div>
    <!-- /ko -->
    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
    <!-- /ko -->
    <!-- ko if: koIsEmptyElement() -->
    <div class="svc-panel__placeholder_frame-wrapper">
      <div class="svc-panel__placeholder_frame">
        <div class="svc-panel__placeholder" data-bind="text: placeholderText"></div>
        <!-- ko if: showAddQuestionButton -->
        <div class="svc-panel__add-new-question svc-action-button" data-bind="click: addNewQuestion, key2click, clickBubble: false">
          <!-- ko component: { name: 'sv-svg-icon', params: { css: 'svc-panel__add-new-question-icon', iconName: 'icon-add_24x24', size: 24 } } -->
          <!-- /ko -->
          <span class="svc-text svc-text--normal svc-text--bold" data-bind="text: \$data.addNewQuestionText">
          </span>
        </div>
        <!-- /ko -->
      </div>
    </div>
    <!-- /ko -->

    <!-- ko if: adornerComponent && \$data.element.isInteractiveDesignElement -->
    <!-- ko component: { name: adornerComponent, params: { model: \$data } } -->
    <!-- /ko -->
    <!-- /ko -->

    <!-- ko if: !koIsEmptyElement() && showAddQuestionButton -->
    <div class="svc-panel__add-new-question-container">
      <div class="svc-panel__question-type-selector-popup"><sv-popup params="model: questionTypeSelectorModel.popupModel"></sv-popup></div>
      <div class="svc-panel__add-new-question-wrapper">
        <!-- ko component: { name: 'svc-add-new-question-btn', params: { item: { data: \$data }, buttonClass: 'svc-action-button', renderPopup: false } } -->
        <!-- /ko -->
      </div>
    </div>
    <!-- /ko -->

    <!-- ko if: \$data.element.isInteractiveDesignElement -->
    <div class="svc-question__content-actions" data-bind="event: {focusin: koSelect}">
      <!-- ko component: { name: 'sv-action-bar', params: { model: actionContainer, handleClick: false } } -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/question-banner.html":
                    /*!*******************************************!*\
  !*** ./src/adorners/question-banner.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-carry-forward-panel-wrapper">
  <div class="svc-carry-forward-panel">
    <span data-bind="text:text"></span>
    <span class="svc-carry-forward-panel__link">
      <!-- ko component: { name: "svc-action-button", params: { text: actionText, click: onClick } }-->
      <!-- /ko -->
    </span>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/question-dropdown.html":
                    /*!*********************************************!*\
  !*** ./src/adorners/question-dropdown.html ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__dropdown-choices--wrapper">
  <div>
    <div class="svc-question__dropdown-choices">
      <!-- ko foreach: { data: getRenderedItems(), as: 'item' }  -->
      <div data-bind="css: \$parent.getChoiceCss()">
        <!-- ko component: { name: question.getItemValueWrapperComponentName(item), params: { componentData:  question.getItemValueWrapperComponentData(item), templateData: { name: \$parent.itemComponent, data: item } } } -->
        <!-- /ko -->
      </div>
      <!-- /ko -->
    </div>
    <!-- ko if: needToCollapse -->
    <svc-action-button params="text: getButtonText(), click: switchCollapse, allowBubble: true">
    </svc-action-button>
    <!-- /ko -->
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/question-image.html":
                    /*!******************************************!*\
  !*** ./src/adorners/question-image.html ***!
  \******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: !isUploading && !\$data.koIsEmptyImageLink() -->
<div class="svc-image-question-controls">
  <!-- ko if: (allowEdit) -->
  <input type="file" aria-hidden="true" tabindex="-1" class="svc-choose-file-input" data-bind="attr: { accept: acceptedTypes }">
  <sv-svg-icon class="svc-context-button" data-bind="click: chooseFile, key2click" params="iconName: 'icon-file', size: 24"></sv-svg-icon>
  <!-- /ko -->
</div>
<!-- /ko -->
<!-- ko if: isUploading && !\$data.koIsEmptyImageLink() -->
<div class="svc-image-question__loading-placeholder">
  <div class="svc-image-question__loading">
    <!-- ko component: { name: 'sv-loading-indicator' } -->
    <!-- /ko -->
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/question-rating.html":
                    /*!*******************************************!*\
  !*** ./src/adorners/question-rating.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-rating-question-content">
  <div data-bind="class: controlsClassNames">
    <!-- ko if: allowRemove -->
    <sv-svg-icon data-bind="class: removeClassNames, click: removeItem, key2click, attr: { 'aria-label': removeTooltip }" params="iconName: 'icon-remove_16x16', size: 16, title: removeTooltip">
    </sv-svg-icon>
    <!-- /ko -->
    <!-- ko if: allowAdd -->
    <sv-svg-icon data-bind="class: addClassNames, click: addItem, key2click, attr: { 'aria-label': addTooltip }" params="iconName: 'icon-add_16x16', size: 16, title: addTooltip">
    </sv-svg-icon>
    <!-- /ko -->
  </div>
  <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/adorners/question.html":
                    /*!************************************!*\
  !*** ./src/adorners/question.html ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__adorner" data-bind="css: rootCss(), attr: { 'data-sv-drop-target-survey-element': element.name || null }, event: { dblclick: (d, e) => dblclick(e), mouseover: function(m, e) { hover(e, \$element); }, mouseleave: function(m, e) { hover(e, \$element); } }">
  <!-- ko if: \$data.showHiddenTitle -->
  <div data-bind="css: \$data.cssCollapsedHiddenHeader">
    <div data-bind="css: \$data.cssCollapsedHiddenTitle">
      <!-- ko if: !!\$data.element.hasTitle -->
      <!-- ko template: { name: 'survey-string', data: \$data.element.locTitle } --><!-- /ko -->
      <!-- /ko -->
      <!-- ko ifnot: !!\$data.element.hasTitle -->
      <span class="svc-fake-title" data-bind="text: element.name"></span>
      <!-- /ko -->
    </div>
  </div>
  <!-- /ko -->
  <div data-bind="click: koSelect, key2click: { disableTabStop: true }, clickBubble: false, css: css()">
    <div class="svc-question__drop-indicator svc-question__drop-indicator--left"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--right"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--top"></div>
    <div class="svc-question__drop-indicator svc-question__drop-indicator--bottom"></div>
    <!-- ko if: allowDragging -->
    <div class="svc-question__drag-area" data-bind="event: { pointerdown: (model, event)=>{ onPointerDown(event); return true; } }">
      <!-- ko component: { name: 'sv-svg-icon', params: { css: 'svc-question__drag-element', iconName: 'icon-drag-area-indicator_24x16', size: 24 } } -->
      <!-- /ko -->
      <div class="svc-question__top-actions">
        <!-- ko component: { name: 'sv-action-bar', params: { model: topActionContainer, handleClick: false } } -->
        <!-- /ko -->
      </div>
    </div>
    <!-- /ko -->
    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
    <!-- /ko -->
    <!-- ko if: koIsEmptyElement() && !\$data.placeholderComponentData -->
    <div class="svc-panel__placeholder_frame-wrapper">
      <div class="svc-panel__placeholder_frame">
        <div class="svc-panel__placeholder" data-bind="text: placeholderText"></div>
      </div>
    </div>
    <!-- /ko -->
    <!-- ko if: koIsEmptyElement() && !!\$data.placeholderComponentData -->
    <!-- ko let: { question: placeholderComponentData.data }  -->
    <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: placeholderComponentData } } -->
    <!-- /ko -->
    <!-- /ko -->
    <!-- /ko -->

    <!-- ko if: adornerComponent -->
    <!-- ko component: { name: adornerComponent, params: { model: \$data } } -->
    <!-- /ko -->
    <!-- /ko -->

    <!-- ko if: isBannerShowing -->
    <!-- ko component: { name: 'svc-question-banner', params: \$data } -->
    <!-- /ko -->
    <!-- /ko -->
    <div class="svc-question__content-actions" data-bind="event: {focusin: koSelect}">
      <!-- ko component: { name: 'sv-action-bar', params: { model: actionContainer, handleClick: false } } -->
      <!-- /ko -->
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/components/surface-placeholder.html":
                    /*!*************************************************!*\
  !*** ./src/components/surface-placeholder.html ***!
  \*************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-surface-placeholder">
  <div class="svc-surface-placeholder__image" data-bind="css: 'svc-surface-placeholder__image--' + \$data.name"></div>
  <div class="svc-surface-placeholder__text">
    <div class="svc-surface-placeholder__title" data-bind="text: \$data.placeholderTitleText"></div>
    <div class="svc-surface-placeholder__description" data-bind="text: \$data.placeholderDescriptionText"></div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/boolean-switch.html":
                    /*!**************************************************!*\
  !*** ./src/custom-questions/boolean-switch.html ***!
  \**************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="spg-boolean-switch" role="checkbox" data-bind="click: function() { question.value = !question.value; }, attr: {id: question.inputId, 'aria-required': question.ariaRequired, 'aria-label': question.ariaLabel, 'aria-invalid': question.ariaInvalid, 'aria-errormessage': question.ariaErrormessage}">
  <div class="spg-boolean-switch__button" tabindex="0" data-bind="css: { 'spg-boolean-switch__button--checked': question.koValue }">
    <div class="spg-boolean-switch__thumb">
      <div class="spg-boolean-switch__thumb-circle spg-boolean-switch__thumb--left"></div>
    </div>
    <div class="spg-boolean-switch__thumb">
      <div class="spg-boolean-switch__thumb-circle spg-boolean-switch__thumb--right"></div>
    </div>
  </div>
  <div class="spg-boolean-switch__caption">
    <div class="spg-boolean-switch__title">
      <!-- ko template: { name: 'survey-string', data: question.locTitle } --><!-- /ko -->
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/color-item.html":
                    /*!**********************************************!*\
  !*** ./src/custom-questions/color-item.html ***!
  \**********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<span class="spg-color-editor__color-swatch" data-bind="style: getSwatchStyle()"></span>
<!-- ko template: { name: 'survey-string', data: item.locTitle } --><!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/question-color.html":
                    /*!**************************************************!*\
  !*** ./src/custom-questions/question-color.html ***!
  \**************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: question.cssClasses.root, event: { keydown: question.koOnKeyDown }">
  <label data-bind="css: question.getSwatchCss(), style: question.getSwatchStyle()">
    <!-- ko component: { name: 'sv-svg-icon', params: { iconName: question.cssClasses.swatchIcon, size: 'auto' } } --><!-- /ko -->
    <input type="color" data-bind="disable: question.isInputReadOnly, css: question.cssClasses.colorInput, value: question.renderedColorValue, event: { change: question.koOnColorInputChange }" tabindex="-1">
  </label>
  <input autocomplete="off" data-bind="disable: question.isInputReadOnly, attr: { id: question.inputId, placeholder: question.renderedPlaceholder, 'aria-required': question.ariaRequired, 'aria-label': question.ariaLabel, 'aria-invalid': question.ariaInvalid, 'aria-describedby': question.ariaDescribedBy },
    event: { change: question.koOnChange, blur: question.koOnBlur, keyup: question.koOnKeyUp, beforeinput: question.koOnBeforeInput },
    value: question.renderedValue,
    css: question.cssClasses.control">
  <!-- ko if: question.showDropdownAction -->
  <!-- ko component: { name: 'sv-action-bar-item', params: { item: question.koDropdownAction() } } --><!-- /ko -->
  <sv-popup params="model: question.dropdownAction.popupModel"></sv-popup>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/question-file.html":
                    /*!*************************************************!*\
  !*** ./src/custom-questions/question-file.html ***!
  \*************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko template: { afterRender: question.koQuestionAfterRender } -->
<div data-bind="css: question.cssClasses.root, event: { keydown: question.koOnKeyDown, dragenter: question.ondragenter, dragover: question.ondragover, drop: question.ondrop, dragleave: question.ondragleave }">
  <input type="text" data-bind="css: question.cssClasses.control, value: question.koReadOnlyValue, disable: question.isInputReadOnly, attr: { placeholder: question.renderedPlaceholder }, event: { change: question.koOnInputChange, blur: question.koOnInputBlur }">
  <input type="file" data-bind="css: question.cssClasses.fileInput, disable: question.isInputReadOnly, attr: { id: question.inputId, 'aria-required': question.ariaRequired, 'aria-label': question.ariaLabel, 'aria-invalid': question.ariaInvalid, 'aria-describedby': question.ariaDescribedBy, multiple: question.allowMultiple ? 'multiple' : undefined, title: question.koInputTitle, accept: question.acceptedTypes }, event: { change: question.doFileInputChange }" tabindex="-1">
  <div data-bind="css: question.cssClasses.buttonsContainer">
    <button type="button" data-bind="css: question.cssClasses.clearButton, disable: question.getIsClearButtonDisabled(), click: question.doclean, key2click">
      <!-- ko component: { name: 'sv-svg-icon', params: { iconName: question.cssClasses.clearButtonIcon, size: 'auto', title: question.clearButtonCaption } } --><!-- /ko -->
    </button>
    <label role="button" data-bind="click: (_, event) => question.chooseFiles(event), css: question.getChooseButtonCss(), attr: { for: question.inputId, 'aria-label': question.chooseButtonCaption }, key2click" tabindex="0">
      <!-- ko component: { name: 'sv-svg-icon', params: { title: question.chooseButtonCaption, iconName: question.cssClasses.chooseButtonIcon, size: 'auto' } } --><!-- /ko -->
    </label>
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/spin-editor.html":
                    /*!***********************************************!*\
  !*** ./src/custom-questions/spin-editor.html ***!
  \***********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: question.cssClasses.root, event: { keydown: question.koOnKeyDown }">
  <input autocomplete="off" data-bind="disable: question.isInputReadOnly, attr: { id: question.inputId, placeholder: question.renderedPlaceholder, 'aria-required': question.ariaRequired, 'aria-label': question.ariaLabel, 'aria-invalid': question.ariaInvalid, 'aria-describedby': question.ariaDescribedBy },
    event: { change: question.koOnChange, keydown: question.koOnInputKeyDown, keyup: question.koOnKeyUp, blur: question.koOnBlur, focus: question.koOnFocus, beforeinput: question.koOnBeforeInput },
    value: question.renderedValue,
    css: question.cssClasses.control">
  <span data-bind="css: question.cssClasses.buttonsContainer">
    <button data-bind="css: question.cssClasses.arrowButton, disable: question.isInputReadOnly, event: { mousedown: question.koOnDownButtonMouseDown, mouseup: question.koOnButtonMouseUp, mouseleave: question.koOnButtonMouseLeave, blur: question.koOnBlur, focus: question.koOnFocus }" tabindex="-1">
      <!-- ko component: { name: 'sv-svg-icon', params: { iconName: question.cssClasses.decreaseButtonIcon, size: 'auto' } } --><!-- /ko -->
    </button>
    <button data-bind="css: question.cssClasses.arrowButton, disable: question.isInputReadOnly, event: { mousedown:  question.koOnUpButtonMouseDown, mouseup: question.koOnButtonMouseUp, mouseleave: question.koOnButtonMouseLeave, blur: question.koOnBlur, focus: question.koOnFocus }" tabindex="-1">
      <!-- ko component: { name: 'sv-svg-icon', params: { iconName: question.cssClasses.increaseButtonIcon, size: 'auto' } } --><!-- /ko -->
    </button>
  </span>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/custom-questions/text-with-reset.html":
                    /*!***************************************************!*\
  !*** ./src/custom-questions/text-with-reset.html ***!
  \***************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: question.getRootClass()">
  <!-- ko template: { name: "survey-question-" + question.wrappedQuestionTemplate, data: question, as: 'question', afterRender: question.koQuestionAfterRender } -->
  <!-- /ko -->
  <button type="button" data-bind="click: function() { question.resetValueAdorner.resetValue() }, css: question.cssClasses.resetButton, disable: question.resetValueAdorner.isDisabled, attr: { title: question.resetValueAdorner.caption }">
    <!-- ko component: { name: 'sv-svg-icon', params: {  iconName: question.cssClasses.resetButtonIcon, size: 'auto' } } --><!-- /ko -->
  </button>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/header/logo-image.html":
                    /*!************************************!*\
  !*** ./src/header/logo-image.html ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-logo-image" data-bind="click: function(m, e) { return true; }, clickBubble: false">
  <input type="file" aria-hidden="true" tabindex="-1" class="svc-choose-file-input" data-bind="attr: { accept: acceptedTypes }">
  <!-- ko ifnot: survey.locLogo.koRenderedHtml -->
  <!-- ko if: allowEdit && !isUploading -->
  <div class="svc-logo-image-placeholder" data-bind="click: chooseFile, key2click">
    <svg>
      <use xlink:href="#icon-logo"></use>
    </svg>
  </div>
  <!-- /ko -->
  <!-- /ko -->
  <!-- ko if: !isUploading && survey.locLogo.koRenderedHtml -->
  <div data-bind="css: containerCss">
    <div class="svc-context-container svc-logo-image-controls">
      <sv-svg-icon class="svc-context-button" data-bind="click: chooseFile, key2click" params="iconName: 'icon-file', size: 24"></sv-svg-icon>
      <sv-svg-icon class="svc-context-button svc-context-button--danger" data-bind="click: remove, key2click" params="iconName: 'icon-clear', size: 24"></sv-svg-icon>
    </div>
    <!-- ko component: { name: 'sv-logo-image', params: survey } -->
    <!-- /ko -->
  </div>
  <!-- /ko -->
  <!-- ko if: isUploading -->
  <div class="svc-logo-image__loading">
    <!-- ko component: { name: 'sv-loading-indicator' } -->
    <!-- /ko -->
  </div>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/page-navigator/page-navigator-item.html":
                    /*!*****************************************************!*\
  !*** ./src/page-navigator/page-navigator-item.html ***!
  \*****************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-page-navigator-item-content" data-bind="click: action, key2click, css: { 'svc-page-navigator-item--selected': active, 'svc-page-navigator-item--disabled': disabled }">
  <div class="svc-page-navigator-item__dot" data-bind="attr: { title: text }"></div>

  <div class="svc-page-navigator-item__banner">
    <span class="svc-text svc-text--small svc-text--bold" data-bind="text: text"></span>
    <span class="svc-page-navigator-item__dot"></span>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/page-navigator/page-navigator.html":
                    /*!************************************************!*\
  !*** ./src/page-navigator/page-navigator.html ***!
  \************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: visible -->
<div class="svc-page-navigator">
    <div class="svc-page-navigator__selector" data-bind="click: togglePageSelector, key2click, attr: { title: pageSelectorCaption }, css: { 'svc-page-navigator__selector--opened': isPopupOpened }">
        <sv-svg-icon class="svc-page-navigator__navigator-icon" params="iconName: icon, size: 24"></sv-svg-icon>
        <sv-popup params="model: popupModel, cssClass: 'svc-page-navigator__popup'"></sv-popup>
    </div>
    <div>
        <!-- ko foreach: visibleItems -->
        <svc-page-navigator-item params="item: \$data"></svc-page-navigator-item>
        <!-- /ko -->
    </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/page.html":
                    /*!***********************!*\
  !*** ./src/page.html ***!
  \***********************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: page -->
<div class="svc-page__content" data-bind="click: select, key2click, clickBubble: false, css: css, attr: { id: page.id }, event: { dblclick: (d, e) => dblclick(e), mouseover: function(m, e) { hover(e, \$element); }, mouseleave: function(m, e) { hover(e, \$element); } }">
  <div class="svc-page__content-actions">
    <!-- ko component: { name: 'sv-action-bar', params: { model: actionContainer } } -->
    <!-- /ko -->
  </div>
  <!-- ko template: { name: 'survey-page', data: page } -->
  <!-- /ko -->
  <!-- ko if: \$data.showPlaceholder -->
  <div class="svc-page__placeholder_frame">
    <div class="svc-panel__placeholder_frame">
      <div class="svc-panel__placeholder" data-bind="text: \$data.placeholderText"></div>
    </div>
  </div>
  <!-- /ko -->
  <!-- ko component: { name: 'sv-action-bar', params: { model: footerActionsBar } } -->
  <!-- /ko -->
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/question-editor-content.html":
                    /*!******************************************!*\
  !*** ./src/question-editor-content.html ***!
  \******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko let: { question: survey.getAllQuestions()[0] } -->
  <!-- ko component: { name: survey.getElementWrapperComponentName(question), params: { componentData:  survey.getElementWrapperComponentData(question), templateData: { name: question.koElementType, data: question } } } -->
  <!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/question-embedded-survey.html":
                    /*!*******************************************!*\
  !*** ./src/question-embedded-survey.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: (!!embeddedSurvey && !!embeddedSurvey.currentPage) -->
<div data-bind="attr: { id: currentPageId }, template: { name: 'survey-page', data: embeddedSurvey.currentPage }">
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/question-link-value.html":
                    /*!**************************************!*\
  !*** ./src/question-link-value.html ***!
  \**************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<svc-action-button params="text: linkValueText, click: koClickLink, selected: isSelected, disabled: !isClickable, classes: linkSetButtonCssClasses, title: tooltip, iconName:iconName">
</svc-action-button>
<!-- ko if: !isReadOnly && showClear -->
<svc-action-button params="text: clearCaption, click: koClearLink, selected: isSelected, disabled: false, classes: linkClearButtonCssClasses, iconName:iconName">
</svc-action-button>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/question-widget.html":
                    /*!**********************************!*\
  !*** ./src/question-widget.html ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-question__adorner" data-bind="css: rootCss(), attr: { 'data-sv-drop-target-survey-element': element.name }, event: { mouseover: function(m, e) { hover(e, \$element); }, mouseleave: function(m, e) { hover(e, \$element); } }">
  <!-- ko if: question.isInteractiveDesignElement -->
  <div class="svc-question__content" data-bind="click: koSelect, key2click, clickBubble: false, css: css()">
    <!-- ko if: allowDragging -->
    <div class="svc-question__drag-area" data-bind="visible:allowDragging, event: {pointerdown: (model, event)=>{onPointerDown(event)}}">
      <!-- ko component: { name: 'sv-svg-icon', params: { css: 'svc-question__drag-element', iconName: 'icon-drag-area-indicator_24x16', size: 24 } } -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
    <div class="svc-widget__content">
      <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
      <!-- /ko -->
    </div>
    <!-- ko if: isEmptyElement -->
    <div class="svc-panel__placeholder_frame">
      <div class="svc-panel__placeholder" data-bind="text: placeholderText"></div>
    </div>
    <!-- /ko -->

    <div class="svc-question__content-actions">
      <!-- ko component: { name: 'sv-action-bar', params: { model: actionContainer } } -->
      <!-- /ko -->
    </div>
  </div>
  <!-- /ko -->
  <!-- ko ifnot: question.isInteractiveDesignElement -->
  <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
  <!-- /ko -->
  <!-- ko if: isEmptyElement -->
  <div class="svc-panel__placeholder_frame">
    <div class="svc-panel__placeholder" data-bind="text: placeholderText"></div>
  </div>
  <!-- /ko -->
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/results-table-row.html":
                    /*!************************************!*\
  !*** ./src/results-table-row.html ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko with: model -->
<tr data-bind="click: toggle, key2click">
    <td class="svd-dark-border-color" data-bind="style: { paddingLeft: textMargin }">
        <!-- ko if: isNode -->
        <span class="svd-test-results__marker" data-bind="css: { 'svd-test-results__marker--expanded': !collapsed },
                         style: { left: markerMargin }">
            <sv-svg-icon params="iconName: 'icon-expand_16x16', size: 16"></sv-svg-icon>
        </span>
        <!-- /ko -->
        <!-- ko if: \$data.question -->
        <!-- ko template: { name: 'survey-string', data: question.locTitle } --><!-- /ko -->
        <!-- /ko -->
        <!-- ko ifnot: \$data.question -->
        <span data-bind="text: title"></span>
        <!-- /ko -->
    </td>
    <td data-bind="css: (isNode ? 'svd-test-results__node-value' : 'svd-dark-border-color'), text: getString(displayValue)">
    </td>
</tr>
<!-- ko if: isNode && !collapsed -->
<!-- ko foreach: data -->
<!-- ko component: { name: 'survey-results-table-row', params: { model: \$data } } -->
<!-- /ko -->
<!-- /ko -->
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/results.html":
                    /*!**************************!*\
  !*** ./src/results.html ***!
  \**************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svd-test-results">
    <div class="svd-test-results__header">
        <div class="svd-test-results__header-text" data-bind="text: surveyResultsText"></div>
        <div class="svd-test-results__header-types">
            <svc-action-button params="text: surveyResultsTableText, click: selectTableClick, disabled: false, selected: isTableSelected">
            </svc-action-button>
            <svc-action-button params="text: surveyResultsJsonText, click: selectJsonClick, disabled: false, selected: isJsonSelected">
            </svc-action-button>
        </div>
    </div>
    <div class="svd-test-results__text svd-light-bg-color" data-bind="visible: resultViewType === 'text'">
        <div data-bind="text: resultText"></div>
    </div>
    <div class="svd-test-results__table svd-light-bg-color" data-bind="visible: resultViewType === 'table'">
        <table>
            <thead>
                <tr class="svd-light-background-color">
                    <th class="svd-dark-border-color" data-bind="text: resultsTitle"></th>
                    <th class="svd-dark-border-color" data-bind="text: resultsDisplayValue"></th>
                </tr>
            </thead>
            <tbody>
                <!-- ko foreach: resultData -->
                <!-- ko component: { name: 'survey-results-table-row', params: { model: \$data } } -->
                <!-- /ko -->
                <!-- /ko -->
            </tbody>
        </table>
    </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/row.html":
                    /*!**********************!*\
  !*** ./src/row.html ***!
  \**********************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: cssClasses">
  <div class="svc-row__drop-indicator svc-row__drop-indicator--top"></div>
  <div class="svc-row__drop-indicator svc-row__drop-indicator--bottom"></div>
  <!-- ko component: { name: 'sv-template-renderer', params: { componentData: null, templateData: templateData } } -->
  <!-- /ko -->
</div>
`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/object-selector.html":
                    /*!*******************************************!*\
  !*** ./src/side-bar/object-selector.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko with: model -->
<!-- ko if: isVisible -->
<div class="svc-object-selector__content" data-bind="component: { name: 'sv-list', params: { model: list } }"></div>
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/property-grid-placeholder.html":
                    /*!*****************************************************!*\
  !*** ./src/side-bar/property-grid-placeholder.html ***!
  \*****************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-property-grid-placeholder">
  <div class="svc-property-grid-placeholder__header">
    <span class="svc-property-grid-placeholder__title" data-bind="text: title"></span>
    <span class="svc-property-grid-placeholder__description" data-bind="text: description"></span>
  </div>
  <div class="svc-property-grid-placeholder__content">
    <div class="svc-property-grid-placeholder__gap"></div>
    <div class="svc-property-grid-placeholder__image"></div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/property-grid.html":
                    /*!*****************************************!*\
  !*** ./src/side-bar/property-grid.html ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="spg-container" data-bind="css: {'spg-container_search': \$data.model.searchEnabled } ">
    <!-- ko component: { name: 'svc-search', params: { model: model.searchManager } } -->
    <!-- /ko -->
    <!-- ko template: { name: 'survey-content', data: model.survey  } -->
    <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/search.html":
                    /*!**********************************!*\
  !*** ./src/side-bar/search.html ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: \$data.model.isVisible -->
<div class="spg-search-editor_container">
    <div class="spg-search-editor_search-icon">
        <!-- ko component: { name: 'sv-svg-icon', params: { iconName: 'icon-search', size: 'auto' }  } -->
        <!-- /ko -->
    </div>
    <input type="text" class="spg-search-editor_input" data-bind="textInput: model.filterString, attr: { placeholder: model.filterStringPlaceholder, 'aria-label': model.filterStringPlaceholder }">
    <div class="spg-search-editor_toolbar">
        <div class="spg-search-editor_toolbar-counter" data-bind="text: model.matchCounterText"></div>
        <!-- ko component: { name: 'sv-action-bar', params: { model: model.searchActionBar } } -->
        <!-- /ko -->
    </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-default-header.html":
                    /*!***************************************************!*\
  !*** ./src/side-bar/side-bar-default-header.html ***!
  \***************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-side-bar__container-header">
  <div class="svc-side-bar__container-actions">
    <!-- ko component: { name: 'sv-action-bar', params: { model: model.toolbar } } -->
    <!-- /ko -->
  </div>
  <!-- ko if: !!model.title -->
  <div class="svc-side-bar__container-title" data-bind="text: model.title">
  </div>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-header.html":
                    /*!*******************************************!*\
  !*** ./src/side-bar/side-bar-header.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-side-bar__container-header svc-sidebar__header-container">
  <!-- ko if: !model.subTitle -->
  <div class="svc-side-bar__container-title" data-bind="text: model.title"></div>
  <!-- /ko -->
  <!-- ko if: model.subTitle -->
  <div class="svc-sidebar__header-caption">
    <span class="svc-sidebar__header-title" data-bind="text: model.title"></span>
    <span class="svc-sidebar__header-subtitle" data-bind="text: model.subTitle"></span>
  </div>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-page.html":
                    /*!*****************************************!*\
  !*** ./src/side-bar/side-bar-page.html ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: item.visible -->
<!-- ko component: { name: item.componentName, params: { model: item.componentData } } -->
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-property-grid-header.html":
                    /*!*********************************************************!*\
  !*** ./src/side-bar/side-bar-property-grid-header.html ***!
  \*********************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-sidebar__header svc-sidebar__header--tabbed">
  <div class="svc-sidebar__header-container svc-sidebar__header-container--with-subtitle">
    <div class="svc-sidebar__header-content" data-bind="click: function(s, args) { \$data.model.action(\$data); }, key2click: { processEsc: false }">
      <div data-bind="css: \$data.model.buttonClassName">
        <div class="svc-sidebar__header-caption">
          <span class="svc-sidebar__header-title" data-bind="text: model.title"></span>
          <span class="svc-sidebar__header-subtitle" data-bind="text: model.tooltip"></span>
        </div>
      </div>
      <sv-popup params="{ model: model.popupModel, getTarget: \$parent.getTarget }"></sv-popup>
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/side-bar.html":
                    /*!************************************!*\
  !*** ./src/side-bar/side-bar.html ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-side-bar" data-bind="css: { 'svc-flyout-side-bar' : flyoutPanelMode }, visible: hasVisiblePages">
  <div class="svc-side-bar__shadow" data-bind="click: collapseSidebar"></div>
  <div class="svc-flex-row svc-side-bar__wrapper">
    <div class="svc-side-bar__container" data-bind="visible: renderedIsVisible">
      <!-- ko component: { name: header.component, params: { model: header.componentModel } } -->
      <!-- /ko -->
      <div class="svc-side-bar__container-content">
        <!-- ko foreach: pages -->
        <!-- ko component: { name: 'svc-side-bar-page', params: { item: \$data } } -->
        <!-- /ko -->
        <!-- /ko-->
      </div>
    </div>
    <!-- ko if: sideAreaComponentName -->
    <!-- ko component: { name: sideAreaComponentName, params: { model: sideAreaComponentData } } -->
    <!-- /ko -->
    <!-- /ko -->
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/tab-button.html":
                    /*!**************************************!*\
  !*** ./src/side-bar/tab-button.html ***!
  \**************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-menu-action">
  <div data-bind="click: function(s, args) { model.action(model); }, key2click: { processEsc: false },
    css: model.buttonClassName,
    attr: { title: model.tooltip }">
    <div class="svc-menu-action__icon">
      <div class="svc-menu-action__icon-container">
        <!-- ko component: { name: 'sv-svg-icon', params: { iconName: model.iconName, size: 24 } } -->
        <!-- /ko -->
      </div>
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/tab-control.html":
                    /*!***************************************!*\
  !*** ./src/side-bar/tab-control.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: model.sideBarClassName">
  <div class="svc-sidebar-tabs__top-container">
    <div class="svc-sidebar-tabs__collapse-button">
      <!-- ko component: { name: 'svc-tab-button', params: { model: model.expandCollapseAction } } -->
      <!-- /ko -->
    </div>
    <div class="svc-sidebar-tabs__separator">
      <div></div>
    </div>
    <div class="svc-sidebar-tabs__items">
      <!-- ko component: { name: 'svc-tabs', params: { model: model.topToolbar } } -->
      <!-- /ko -->
    </div>
  </div>
  <div class="svc-sidebar-tabs__bottom-container">
    <div class="svc-sidebar-tabs__items">
      <!-- ko component: { name: 'svc-tabs', params: { model: model.bottomToolbar } } -->
      <!-- /ko -->
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/side-bar/tabs.html":
                    /*!********************************!*\
  !*** ./src/side-bar/tabs.html ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko foreach: model.actions -->
<!-- ko component: { name: 'svc-tab-button', params: { model: \$data } } -->
<!-- /ko -->
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/simulator.html":
                    /*!****************************!*\
  !*** ./src/simulator.html ***!
  \****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="class: getRootCss(), event: { keydown: tryToZoom, mouseover: (device === 'desktop' ? null : activateZoom), mouseout: (device === 'desktop' ? null : deactivateZoom) }">
  <!-- ko if: hasFrame -->
  <div class="svd-simulator-wrapper" id="svd-simulator-wrapper" data-bind="style: { width: simulatorFrame.frameWidth + 'px', height: simulatorFrame.frameHeight + 'px' }">
    <div class="svd-simulator" data-bind="style: { width: simulatorFrame.deviceWidth + 'px', height: simulatorFrame.deviceHeight + 'px', transform: 'scale(' + simulatorFrame.scale + ') translate(-50%, -50%)' }">
      <survey-widget class="svd-simulator-content" params="model: survey"></survey-widget>
    </div>
  </div>
  <!-- /ko -->
  <!-- ko ifnot: hasFrame -->
  <survey-widget class="svd-simulator-content" params="model: survey"></survey-widget>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/string-editor.html":
                    /*!********************************!*\
  !*** ./src/string-editor.html ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<span data-bind="class: className">
    <span class="svc-string-editor__content">
        <div class="svc-string-editor__border svc-string-editor__border--hover"></div>
        <div class="svc-string-editor__border svc-string-editor__border--focus"></div>
        <span class="svc-string-editor__input">
            <!-- ko ifnot: koHasHtml -->
            <!-- ko template: {afterRender: afterRender} -->
            <span role="textbox" class="sv-string-editor" spellcheck="false" data-bind="text: koRenderedHtml, event: { focus: onFocus, paste: onPaste, blur: onBlur, input: onInput, keydown: onKeyDown, keyup: onKeyUp, mouseup: onMouseUp, compositionstart: onCompositionStart, compositionend: onCompositionEnd }, click: edit, attr: { 'aria-placeholder': placeholder, 'aria-label': this.placeholder || 'content editable', contenteditable: contentEditable }"></span>
            <!-- /ko -->
            <!-- /ko -->
            <!-- ko if: koHasHtml -->
            <span role="textbox" class="sv-string-editor sv-string-editor--html" spellcheck="false" data-bind="html: koRenderedHtml, event: { focus: onFocus, blur: onBlur, keydown: onKeyDown, keyup: onKeyUp, mouseup: onMouseUp, compositionstart: onCompositionStart, compositionend: onCompositionEnd }, click: edit, attr: { 'aria-placeholder': placeholder, 'aria-label': this.placeholder || 'content editable', contenteditable: contentEditable }"></span>
            <!-- /ko -->
            <!-- ko if: showCharacterCounter -->
            <!-- ko component: { name: 'sv-character-counter', params: { counter: characterCounter, remainingCharacterCounter: getCharacterCounterClass } } -->
            <!-- /ko -->
            <!-- /ko -->
        </span>
    </span>
    <!-- ko if: errorText -->
    <span class="svc-string-editor__error" data-bind="text: errorText"></span>
    <!-- /ko -->
</span>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/survey-creator.html":
                    /*!*********************************!*\
  !*** ./src/survey-creator.html ***!
  \*********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko ifnot: creator.isCreatorDisposed -->
<div data-bind="css: creator.getRootCss()">
  <div>
    <!-- ko component: { name: 'sv-svg-bundle'} -->
    <!-- /ko -->
  </div>
  <div class="svc-full-container svc-creator__area svc-flex-column" data-bind="css: { 'svc-creator__area--with-banner': !creator.haveCommercialLicense }">
    <div class="svc-flex-row svc-full-container" data-bind="css : { 'svc-creator__side-bar--left': creator.sidebarLocation == 'left' }">
      <div class="svc-flex-column svc-flex-row__element svc-flex-row__element--growing">
        <div class="svc-top-bar">
          <div class="svc-tabbed-menu-wrapper" data-bind="visible: creator.showTabs">
            <!-- ko component: { name: 'svc-tabbed-menu', params: { model: creator.tabbedMenu } } -->
            <!-- /ko -->
          </div>
          <!-- ko if: creator.showToolbar -->
          <div class="svc-toolbar-wrapper" data-bind="visible: creator.showToolbar">
            <!-- ko component: { name: 'sv-action-bar', params: { model: creator.toolbar } } -->
            <!-- /ko -->
          </div>
          <!-- /ko -->
        </div>
        <div class="svc-creator__content-wrapper svc-flex-row" data-bind="css: {'svc-creator__content-wrapper--footer-toolbar' : creator.isMobileView }">
          <div class="svc-creator__content-holder svc-flex-column">
            <!-- ko foreach: creator.tabs -->
            <!-- ko if: \$parent.creator.viewType == id && (\$data.visible === undefined || \$data.visible) -->
            <div class="svc-creator-tab" data-bind="attr: { id: 'scrollableDiv-' + id }, css: { 'svc-creator__toolbox--right': \$parent.creator.toolboxLocation == 'right' }">
              <!-- ko component: { name: componentContent, params: { creator: \$parent.creator, data: data } } -->
              <!-- /ko -->
            </div>
            <!-- /ko -->
            <!-- /ko -->
          </div>
        </div>
        <!-- ko if: creator.isMobileView -->
        <div class="svc-footer-bar">
          <div class="svc-toolbar-wrapper" data-bind="visible: creator.isMobileView">
            <!-- ko component: { name: 'sv-action-bar', params: { model: creator.footerToolbar } } -->
            <!-- /ko -->
          </div>
        </div>
        <!-- /ko -->
      </div>
      <div data-bind="if: creator.sidebar, css: { 'sv-mobile-side-bar': creator.isMobileView }">
        <svc-side-bar params="model: creator.sidebar"> </svc-side-bar>
      </div>
    </div>
    <!-- ko ifnot: creator.haveCommercialLicense -->
    <!-- /ko -->
    <!-- ko component: { name: 'sv-notifier', params: { notifier: creator.notifier } } -->
    <!-- /ko -->
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/survey-renderers/dropdown/dropdown.html":
                    /*!*****************************************************!*\
  !*** ./src/survey-renderers/dropdown/dropdown.html ***!
  \*****************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-survey-dropdown">
  <select data-bind="if: true, attr: {id: question.inputId, 'aria-label': question.locTitle.renderedHtml, 'aria-invalid': question.errors.length > 0, 'aria-describedby': question.errors.length > 0 ? question.id + '_errors' : null}, value: question.renderedValue, valueAllowUnset: true, css: 'svc-survey-dropdown__control'">
    <!-- ko if: question.showOptionsCaption -->
    <option data-bind="text:question.optionsCaption, value: null"></option>
    <!-- /ko -->
    <!-- ko foreach: question.visibleChoices -->
    <option data-bind="value: \$data.value, text: \$data.text, attr: { disabled: !\$data.isEnabled }"></option>
    <!-- /ko -->
  </select>
  <div class="svc-survey-dropdown__container">
    <div class="svc-survey-dropdown__form" tabindex="0" data-bind="css: { 'svc-survey-dropdown__form--disabled': question.readOnly }, hasFocus: isFocused, event: { blur: onBlur }">
      <span data-bind="css: { 'svc-survey-dropdown__placeholder': !question.renderedValue} , text: question.renderedValue || (question.showOptionsCaption ? question.optionsCaption : '') "></span>
      <span class="svc-survey-dropdown__button" data-bind="click: toggle, key2click, disable: question.readOnly, css: { 'svc-survey-dropdown__button--active': isExpanded }">
        <sv-svg-icon class="svc-survey-dropdown__button-icon" params="iconName: 'icon-dropdownarrow', size: 24"></sv-svg-icon>
      </span>
    </div>

    <ul class="svc-survey-dropdown__list" data-bind="visible: isExpanded, event: { mousedown: function (data, e) { e.preventDefault(); }}">
      <!-- ko if: question.showOptionsCaption -->
      <li class="svc-survey-dropdown__list-item" data-bind="css: { 'svc-survey-dropdown__list-item--disabled': !isEnabled, 'svc-survey-dropdown__list-item--selected': question.koValue() == \$data.value }, text:question.optionsCaption"></li>
      <!-- /ko -->
      <!--ko foreach: question.visibleChoices-->
      <li class="svc-survey-dropdown__list-item" data-bind="css: { 'svc-survey-dropdown__list-item--disabled': !isEnabled, 'svc-survey-dropdown__list-item--selected': question.koValue() == \$data.value }, text: \$data.text, click: \$parent.selectItem, key2click"></li>
      <!-- /ko -->
    </ul>
  </div>
  <!-- ko if: question.hasOther -->
  <div class="form-group" data-bind="template: { name: 'survey-comment', data: {'question': question, 'visible': question.isOtherSelected } }, style: {display: question.isFlowLayout ? 'inline': ''}"></div>
  <!-- /ko -->
</div>
`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/survey-renderers/question-error/question-error.html":
                    /*!*****************************************************************!*\
  !*** ./src/survey-renderers/question-error/question-error.html ***!
  \*****************************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div>
  <sv-svg-icon aria-hidden="true" data-bind="css: cssClasses.error.icon" params="iconName: 'icon-alert_24x24', size: 24">
  </sv-svg-icon>
  <span data-bind="css: cssClasses.error.item">
    <!-- ko template: { name: 'survey-string', data: error.locText } --><!-- /ko -->
  </span>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/switcher/switcher.html":
                    /*!************************************!*\
  !*** ./src/switcher/switcher.html ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko with: \$data.item -->
<button type="button" data-bind="click: function(s, args) { \$data.action(\$data, getIsTrusted(args)); }, key2click: { processEsc: false }, disable: \$data.disabled, css: getActionBarItemCss(), attr: { title: \$data.tooltip || \$data.title, 'aria-checked': \$data.ariaChecked, 'role': \$data.ariaRole, 'aria-expanded': typeof \$data.ariaExpanded === 'undefined' ? null : (\$data.ariaExpanded ? 'true': 'false') }">
  <div data-bind="css: getSwitcherIconCss()">
    <div class="svc-switcher__icon-thumb"></div>
  </div>
  <!-- ko if: \$data.hasTitle -->
  <span class="svc-switcher__title" data-bind="text: title"></span>
  <!-- /ko -->
</button>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabbed-menu/tabbed-menu-item.html":
                    /*!***********************************************!*\
  !*** ./src/tabbed-menu/tabbed-menu-item.html ***!
  \***********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-tabbed-menu-item" data-bind="click: action, key2click, css: { 'svc-tabbed-menu-item--selected': active, 'svc-tabbed-menu-item--disabled': disabled }">
  <span class="svc-text svc-text--normal svc-tabbed-menu-item__text" data-bind="text: title, css: { 'svc-text--bold': active }"></span>
</div>
`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabbed-menu/tabbed-menu.html":
                    /*!******************************************!*\
  !*** ./src/tabbed-menu/tabbed-menu.html ***!
  \******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-tabbed-menu">
  <!-- ko foreach: renderedActions -->
  <span class="svc-tabbed-menu-item-container" data-bind="css: { 'sv-action--hidden': !isVisible }, class: \$data.css">
    <div class="sv-action__content">
    <!-- ko component: { name: \$data.component || 'svc-tabbed-menu-item', params: { item: \$data } } -->
    <!-- /ko -->
    </div>
  </span>
  <!-- /ko -->
</div>
`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/designer.html":
                    /*!********************************!*\
  !*** ./src/tabs/designer.html ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<!-- ko if: isToolboxVisible -->
<svc-adaptive-toolbox params="model: creator"></svc-adaptive-toolbox>
<!-- /ko -->
<div class="svc-tab-designer" data-bind="css: getRootCss(), click: clickDesigner">
  <div class="svc-tab-designer_content">
    <!-- ko if: showPlaceholder -->
    <!-- ko if: (creator.showHeaderInEmptySurvey && creator.allowEditSurveyTitle) -->
    <div class="svc-designer-header">
      <!-- ko template: { name: 'survey-header', data: survey } -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
    <div class="svc-designer__placeholder-container" data-bind="attr: { 'data-sv-drop-target-survey-element': 'newGhostPage' }">
      <!-- ko component: { name: 'svc-surface-placeholder', params: { name: 'designer', placeholderTitleText: \$data.placeholderTitleText, placeholderDescriptionText: \$data.placeholderDescriptionText } } -->
      <!-- /ko -->
      <svc-page class="svc-designer-placeholder-page" params="survey: survey, creator: creator, page: newPage">
      </svc-page>
    </div>
    <!-- /ko -->

    <!-- ko if: !showPlaceholder -->

    <div data-bind="css: designerCss, style:{maxWidth: survey.renderedWidth}, elementStyle: creator.designTabSurveyThemeVariables">
      <!-- ko if: creator.allowEditSurveyTitle -->
      <div class="svc-designer-header">
        <!-- ko template: { name: 'survey-header', data: survey } -->
        <!-- /ko -->
      </div>
      <!-- /ko -->

      <!-- ko if: false && survey.isShowProgressBarOnTop -->
      <!-- ko component: { name: survey.getProgressTypeComponent(), params: { model: survey } } -->
      <!-- /ko -->
      <!-- /ko -->

      <!-- ko ifnot: creator.pageEditMode === 'bypage' -->
      <!-- ko foreach: survey.pages -->
      <svc-page class="svc-page" data-bind="attr: { 'data-sv-drop-target-survey-element': \$data.name, 'data-sv-drop-target-page': \$data.name }" params="survey: \$parent.survey, page: \$data, creator: \$parent.creator"></svc-page>
      <!-- /ko -->
      <!-- ko if: showNewPage -->
      <svc-page class="svc-page" data-bind="attr: { 'data-sv-drop-target-survey-element': 'newGhostPage' }" params="survey: survey, creator: creator, page: newPage"></svc-page>
      <!-- /ko -->
      <!-- /ko -->

      <!-- ko if: pagesController.page2Display && creator.pageEditMode === 'bypage' -->
      <svc-page class="svc-page" data-bind="attr: { 'data-sv-drop-target-survey-element': displayPageDropTarget, 'data-sv-drop-target-page': pagesController.page2Display.name }" params="survey: survey, page: pagesController.page2Display, creator: creator"></svc-page>
      <!-- /ko -->

      <!-- ko if: false && survey.isShowProgressBarOnBottom -->
      <!-- ko component: { name: survey.getProgressTypeComponent(), params: { model: survey } } -->
      <!-- /ko -->
      <!-- /ko -->
    </div>

    <!-- ko if: creator.showPageNavigator -->
    <div class="svc-tab-designer__page-navigator">
      <svc-page-navigator params="controller: pagesController, pageEditMode: creator.pageEditMode">
      </svc-page-navigator>
    </div>
    <!-- /ko -->
    <!-- ko if: hasToolbar -->
    <div class="svc-tab-designer__toolbar">
      <!-- ko component: { name: 'sv-action-bar', params: { model: actionContainer, handleClick: false } } -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
    <!-- /ko -->
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/json-editor-ace.html":
                    /*!***************************************!*\
  !*** ./src/tabs/json-editor-ace.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content">
    <div class="svc-json-editor-tab__content">
        <div class="svc-json-editor-tab__ace-editor"></div>
        <div class="svc-json-editor-tab__errros_list" data-bind="visible: hasErrors">
            <!-- ko component: { name: "sv-list", params: { model: errorList } } -->
            <!-- /ko -->
        </div>
    </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/json-editor-textarea.html":
                    /*!********************************************!*\
  !*** ./src/tabs/json-editor-textarea.html ***!
  \********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content">
  <div class="svc-json-editor-tab__content">
    <textarea class="svc-json-editor-tab__content-area" data-bind="textInput: text, disable: readOnly, attr: { 'aria-label': ariaLabel }, event: { keydown: checkKey}">
    </textarea>
    <div class="svc-json-editor-tab__errros_list" data-bind="visible: hasErrors">
      <!-- ko component: { name: "sv-list", params: { model: errorList } } -->
      <!-- /ko -->
    </div>
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/json-error-item.html":
                    /*!***************************************!*\
  !*** ./src/tabs/json-error-item.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko if: \$data.item.iconName -->
<!-- ko component: { name: "sv-svg-icon", params: { iconName: \$data.item.iconName, size: \$data.item.iconSize, css: 'svc-json-error__icon' } }-->
<!-- /ko -->
<!-- /ko -->
<div class="svc-json-error__container">
  <div class="svc-json-error__title">
    <!-- ko template: { name: 'survey-string', data: item.locTitle } --><!-- /ko -->
  </div>
  <!-- ko if: item.data.showFixButton -->
  <button type="button" data-bind="click: item.data.fixError, key2click, clickBubble: false, attr: { title: item.data.fixButtonTitle, 'aria-label': item.data.fixButtonTitle }" class="svc-json-error__fix-button">
    <!-- ko component: { name: "sv-svg-icon", params: { iconName: item.data.fixButtonIcon, size: "auto" } } -->
    <!-- /ko -->
  </button>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/logic-operator.html":
                    /*!**************************************!*\
  !*** ./src/tabs/logic-operator.html ***!
  \**************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: question.cssClasses.selectWrapper">
  <!-- ko ifnot: question.isReadOnly -->
  <div data-bind="css: question.getControlClass(),
  click: click,
  event: { keyup: keyup },
  attr: {
    id: question.inputId,
    required: question.isRequired,
    tabindex: question.isInputReadOnly ? undefined : 0,
    disabled: question.isInputReadOnly,
    role: question.ariaRole,
    'aria-required': question.ariaRequired,
    'aria-label': question.ariaLabel,
    'aria-invalid': question.ariaInvalid,
    'aria-describedby': question.ariaDescribedBy
  },">
    <div data-bind="css: question.cssClasses.controlValue">
      <!-- ko if: question.selectedItemLocText -->
      <!-- ko template: { name: 'survey-string', data: question.selectedItemLocText } -->
      <!-- /ko -->
      <!-- /ko -->
      <div data-bind="text: question.readOnlyText"></div>
    </div>
    <!-- ko if: (question.allowClear && question.cssClasses.cleanButtonIconId) -->
    <div data-bind="css: question.cssClasses.cleanButton, click: clear, visible: !question.isEmpty() ">
      <!-- ko component: { name: 'sv-svg-icon', params: { css: question.cssClasses.cleanButtonSvg, iconName: question.cssClasses.cleanButtonIconId, size: 'auto', title: question.clearCaption } } -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
  </div>
  <!-- ko component: { name: "sv-popup", params: { model: model.popupModel }} -->
  <!-- /ko -->
  <!-- /ko -->
  <!-- ko if: question.isReadOnly -->
  <div disabled="disabled" data-bind="css: question.getControlClass(), attr: { id: question.inputId }, ">
    <!-- ko if: question.selectedItemLocText -->
    <!-- ko template: { name: 'survey-string', data: question.selectedItemLocText } -->
    <!-- /ko -->
    <!-- /ko -->
    <div data-bind="text: question.readOnlyText"></div>
  </div>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/logic.html":
                    /*!*****************************!*\
  !*** ./src/tabs/logic.html ***!
  \*****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content">
  <div class="svc-plugin-tab__content svc-logic-tab__content" data-bind="css: { 'svc-logic-tab--empty': !hasItems }">
    <!-- ko template: { name: 'survey-content', data: itemsSurvey  } -->
    <!-- /ko -->
    <!-- ko if: !hasItems -->
    <div class="svc-logic-tab__content-empty">
      <svc-surface-placeholder params="name: 'logic', placeholderTitleText: \$data.placeholderTitleText, placeholderDescriptionText: \$data.placeholderDescriptionText"></svc-surface-placeholder>
    </div>
    <!-- /ko -->
    <!-- ko if: !readOnly -->
    <div role="button" class="svc-logic-tab__content-action svc-btn" data-bind="click: addNewButton.action, key2click, clickBubble: false, css: {'svc-logic-tab__content-action--disabled': (addNewButton.enabled !== undefined && !addNewButton.enabled) }">
      <span class="svc-text svc-text--normal svc-text--bold" data-bind="text: addNewButton.title">
      </span>
    </div>
    <!-- /ko -->
  </div>
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/test-complete.html":
                    /*!*************************************!*\
  !*** ./src/tabs/test-complete.html ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div role="button" class="svc-preview__test-again svc-btn" data-bind="click: testAgainAction.action, key2click, clickBubble: false">
  <span class="svc-text svc-text--normal svc-text--bold" data-bind="text: testAgainAction.title">
  </span>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/test.html":
                    /*!****************************!*\
  !*** ./src/tabs/test.html ***!
  \****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content svc-test-tab__content" data-bind="css: { 'svc-creator-tab__content--with-toolbar' : isPageToolbarVisible }">
  <!-- ko if: survey.isEmpty -->
  <div class="svc-test-tab--empty">
    <svc-surface-placeholder params="name: 'preview', placeholderTitleText: \$data.placeholderTitleText, placeholderDescriptionText: \$data.placeholderDescriptionText"></svc-surface-placeholder>
  </div>
  <!-- /ko -->
  <!-- ko ifnot: survey.isEmpty -->
  <div class="svc-plugin-tab__content">
    <survey-simulator params="model: simulator"></survey-simulator>
    <!-- ko if: showResults -->
    <survey-results params="survey: survey"></survey-results>
    <!-- /ko -->
  </div>
  <!-- /ko -->
  <!-- ko if: isPageToolbarVisible -->
  <div class="svc-plugin-tab__content-actions svc-test-tab__content-actions">
    <!-- ko component: { name: 'sv-action-bar', params: { model: pages } } -->
    <!-- /ko -->
  </div>
  <!-- /ko -->
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/theme.html":
                    /*!*****************************!*\
  !*** ./src/tabs/theme.html ***!
  \*****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content svc-test-tab__content" data-bind="css: { 'svc-creator-tab__content--with-toolbar' : isPageToolbarVisible }">
  <!-- ko if: survey.isEmpty -->
  <div class="svc-test-tab--empty">
    <svc-surface-placeholder params="name: 'theme', placeholderTitleText: \$data.placeholderTitleText, placeholderDescriptionText: \$data.placeholderDescriptionText"></svc-surface-placeholder>
  </div>
  <!-- /ko -->
  <!-- ko ifnot: survey.isEmpty -->
  <div class="svc-plugin-tab__content">
    <survey-simulator params="model: simulator"></survey-simulator>
    <!-- ko if: showResults -->
    <survey-results params="survey: survey"></survey-results>
    <!-- /ko -->
  </div>
  <!-- /ko -->
  <!-- ko if: isPageToolbarVisible -->
  <div class="svc-plugin-tab__content-actions svc-test-tab__content-actions">
    <!-- ko component: { name: 'sv-action-bar', params: { model: pages } } -->
    <!-- /ko -->
  </div>
  <!-- /ko -->
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/translation/translate-from-action.html":
                    /*!*********************************************************!*\
  !*** ./src/tabs/translation/translate-from-action.html ***!
  \*********************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko with: \$data.item -->
<div data-bind="css: data.containerCss">
  <span data-bind="css: data.additionalTitleCss, text: data.additionalTitle"></span>
  <!-- ko component: { name: 'sv-action-bar-item-dropdown', params: { item: \$data } } -->
  <!-- /ko -->
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/translation/translation-line-skeleton.html":
                    /*!*************************************************************!*\
  !*** ./src/tabs/translation/translation-line-skeleton.html ***!
  \*************************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="sd-translation-line-skeleton">
</div>
`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/tabs/translation/translation.html":
                    /*!***********************************************!*\
  !*** ./src/tabs/translation/translation.html ***!
  \***********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko using: model -->
<div class="svc-creator-tab__content svc-translation-tab" data-bind="css: { 'svc-translation-tab--empty': \$data.isEmpty }">
  <!-- ko if: \$data.isEmpty -->
  <svc-surface-placeholder params="name: 'translation', placeholderTitleText: \$data.placeholderTitleText, placeholderDescriptionText: \$data.placeholderDescriptionText"></svc-surface-placeholder>
  <!-- /ko -->
  <!-- ko ifnot: \$data.isEmpty -->
  <div class="st-content">
    <div class="svc-flex-column st-strings-wrapper">
      <div class="svc-flex-row st-strings-header">
        <!-- ko template: { name: 'survey-content', data: \$data.stringsHeaderSurvey  } --><!-- /ko -->
      </div>
      <div class="svc-flex-row svc-plugin-tab__content st-strings">
        <!-- ko template: { name: 'survey-content', data: \$data.stringsSurvey  } --><!-- /ko -->
      </div>
    </div>
  </div>
  <!-- /ko -->
</div>
<!-- /ko -->`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/adaptive-toolbox.html":
                    /*!*******************************************!*\
  !*** ./src/toolbox/adaptive-toolbox.html ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="class: \$data.toolbox.classNames">
  <div data-bind="event: { focusout: (_, e)=>\$data.toolbox.focusOut(e)  }" class="svc-toolbox__panel">
    <div class="svc-toolbox__scroller sv-drag-target-skipped" data-bind="event:{ scroll: function(model, event) { \$data.toolbox.onScroll(model, event); return true; } }">
      <!-- ko if: \$data.toolbox.showSearch-->
      <div class="svc-toolbox__search-container">
        <!-- ko if: \$data.toolbox.isCompactRendered-->
        <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data.toolbox.searchItem, creator: \$data.creator, model: \$data.toolbox, isCompact: \$data.toolbox.isCompactRendered } } -->
        <!-- /ko -->
        <div class="svc-toolbox__category-separator svc-toolbox__category-separator--search"></div>
        <!-- /ko -->
        <!-- ko component: { name: 'svc-search', params: { model: \$data.toolbox.searchManager } } -->
        <!-- /ko -->
      </div>
      <!-- /ko -->
      <!-- ko if: \$data.toolbox.showPlaceholder-->
      <div class="svc-toolbox__placeholder" data-bind="text:\$data.toolbox.toolboxNoResultsFound"></div>
      <!-- /ko -->
      <div class="svc-toolbox__container">
        <!-- ko ifnot: \$data.toolbox.showInSingleCategory -->
        <!-- ko foreach: categories -->
        <div class="svc-toolbox__category" data-bind="css: { 'svc-toolbox__category--collapsed': \$data.collapsed, 'svc-toolbox__category--empty': \$data.empty }">
          <!-- ko if: \$parent.categories().length > 1 -->
          <div class="svc-toolbox__category-header" data-bind="click: toggleState, key2click, css: { 'svc-toolbox__category-header--collapsed': \$data.toolbox.canCollapseCategories }">
            <span class="svc-toolbox__category-title" data-bind="text: title"></span>
            <!-- ko if: \$data.toolbox.canCollapseCategories -->
            <div class="svc-toolbox__category-header__controls">
              <sv-svg-icon class="svc-toolbox__category-header__button svc-string-editor__button--expand" data-bind="visible: collapsed" params="iconName: 'icon-arrow-down', size: 24"></sv-svg-icon>
              <sv-svg-icon class="svc-toolbox__category-header__button svc-string-editor__button--collapse" data-bind="visible: !collapsed" params="iconName: 'icon-arrow-up', size: 24"></sv-svg-icon>
            </div>
            <!-- /ko -->
          </div>
          <!-- /ko -->
          <!-- ko foreach: items -->
          <!-- ko if: \$data.needSeparator && !\$parent.toolbox.showCategoryTitles-->
          <div class="svc-toolbox__category-separator"></div>
          <!-- /ko -->
          <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data, creator: \$parents[1].creator, model: \$parent.toolbox, isCompact: false } } -->
          <!-- /ko -->
          <!-- /ko -->
        </div>
        <!-- /ko -->
        <!-- /ko -->
        <!-- ko if: \$data.toolbox.showInSingleCategory -->
        <div class="svc-toolbox__category">
          <!-- ko foreach: \$data.toolbox.renderedActions -->
          <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data, creator: \$parent.creator, model: \$parent.toolbox, isCompact: \$parent.toolbox.isCompactRendered } } -->
          <!-- /ko -->
          <!-- /ko -->
        </div>
        <!-- /ko -->
      </div>
    </div>
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-item-group.html":
                    /*!*********************************************!*\
  !*** ./src/toolbox/toolbox-item-group.html ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<!-- ko component: { name: 'svc-toolbox-item', params: { model: \$data.model, item: \$data.item, creator: \$data.creator, isCompact: \$data.isCompact } } -->
<!-- /ko -->
<sv-popup params="{ model: \$data.item.popupModel, getArea: \$data.item.getArea }"></sv-popup>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-item.html":
                    /*!***************************************!*\
  !*** ./src/toolbox/toolbox-item.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-toolbox__item" data-bind="attr: { role: 'button', 'aria-label': item.tooltip, title: item.tooltip }, css: item.className, click: (target, event)=>{ target.model.click(event); return true;}, key2click">
  <span class="svc-toolbox__item-container">
    <!-- ko if: iconName -->
    <sv-svg-icon params="iconName: iconName, size: 24, title: item.tooltip"></sv-svg-icon>
    <!-- /ko -->
  </span>
  <!-- ko if: isCompact -->
  <span class="svc-toolbox__item-banner svc-item__banner">
    <sv-svg-icon params="iconName: iconName, size: 24, title: item.tooltip" class="svc-toolbox__item-icon"></sv-svg-icon>
    <span class="svc-toolbox__item-title" data-bind="text: title"></span>
  </span>
  <!-- /ko -->
  <!-- ko ifnot: isCompact -->
  <span class="svc-toolbox__item-title" data-bind="text: title"></span>
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-list.html":
                    /*!***************************************!*\
  !*** ./src/toolbox/toolbox-list.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="css: model.cssClasses.root">
  <!-- ko template: { foreach: model.renderedActions } -->
  <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data, creator: \$root.creator, model: \$parent.model, isCompact: false } } -->
  <!-- /ko -->
  <!-- /ko -->
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-tool.html":
                    /*!***************************************!*\
  !*** ./src/toolbox/toolbox-tool.html ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div data-bind="class: \$data.item.css">
    <!-- ko if: \$data.item.needSeparator && !\$data.creator.toolbox.showCategoryTitles-->
    <div class="svc-toolbox__category-separator"></div>
    <!-- /ko -->
    <div class="sv-action__content" data-bind="event: { pointerdown: (model, event)=>{onPointerDown(event); return true;}, mouseover: function(model, event) { onMouseOver(model.item, event); return true; }, mouseleave: function(model, event) { onMouseLeave(model.item, event); return true; } }">
        <!-- ko component: { name: \$data.itemComponent, params: { model: \$data, item: \$data.item, creator: \$data.creator, isCompact: \$data.isCompact } } -->
        <!-- /ko -->
    </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/toolbox/toolbox.html":
                    /*!**********************************!*\
  !*** ./src/toolbox/toolbox.html ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ default: () =>
                                    __WEBPACK_DEFAULT_EXPORT__,
                                /* harmony export */
                            }
                        );
                        // Module
                        var code = `<div class="svc-toolbox">
  <div class="svc-toolbox__container">
    <!-- ko ifnot: categories().length == 1 || !\$data.toolbox.showCategoryTitles -->
    <!-- ko foreach: categories -->
    <div class="svc-toolbox__category">
      <div class="svc-toolbox__category-header" data-bind="click: toggleState, key2click, css: { 'svc-toolbox__category-header--collapsed': \$data.toolbox.canCollapseCategories }">
        <span class="svc-toolbox__category-title" data-bind="text: title"></span>
        <!-- ko if: \$data.toolbox.canCollapseCategories -->
        <div class="svc-toolbox__category-header__controls">
          <sv-svg-icon class="svc-toolbox__category-header__button svc-string-editor__button--expand" data-bind="visible: collapsed" params="iconName: 'icon-arrow-down', size: 24"></sv-svg-icon>
          <sv-svg-icon class="svc-toolbox__category-header__button svc-string-editor__button--collapse" data-bind="visible: !collapsed" params="iconName: 'icon-arrow-up', size: 24"></sv-svg-icon>
        </div>
        <!-- /ko -->
      </div>
      <!-- ko ifnot: collapsed -->
      <!-- ko foreach: items -->
      <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data, creator: \$parents[1].creator, model: \$data.toolbox, isCompact: false } } -->
      <!-- /ko -->
      <!-- /ko -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
    <!-- /ko -->

    <!-- ko if: categories().length == 1 || !\$data.toolbox.showCategoryTitles -->
    <div class="svc-toolbox__category">
      <!-- ko foreach: \$data.toolbox.visibleActions -->
      <!-- ko component: { name: 'svc-toolbox-tool', params: { item: \$data, creator: \$parent.creator, model: \$parent.toolbox, isCompact: false } } -->
      <!-- /ko -->
      <!-- /ko -->
    </div>
    <!-- /ko -->
  </div>
</div>`;
                        // Exports
                        /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ =
                            code;

                        /***/
                    },

                /***/ "./src/action-button.ts":
                    /*!******************************!*\
  !*** ./src/action-button.ts ***!
  \******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ ActionButtonViewModel:
                                    () => /* binding */ ActionButtonViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./action-button.html */ "./src/action-button.html"
                        );
                        var ActionButtonViewModel = /** @class */ (function () {
                            function ActionButtonViewModel(data) {
                                var _this = this;
                                this.data = data;
                                this.onClick = function (_, event) {
                                    _this.data.click(_this.data, event);
                                    if (_this.data.allowBubble) {
                                        return true;
                                    }
                                    event.stopPropagation();
                                    return false;
                                };
                            }
                            return ActionButtonViewModel;
                        })();

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-action-button",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return new ActionButtonViewModel(
                                            params
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/add-question-type-selector.ts":
                    /*!*******************************************!*\
  !*** ./src/add-question-type-selector.ts ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ AddNewQuestionTypeSelectorViewModel:
                                    () =>
                                        /* binding */ AddNewQuestionTypeSelectorViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./add-question-type-selector.html */ "./src/add-question-type-selector.html"
                        )["default"];
                        var AddNewQuestionTypeSelectorViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-add-question-type-selector",
                            {
                                template: template,
                            }
                        );

                        /***/
                    },

                /***/ "./src/add-question.ts":
                    /*!*****************************!*\
  !*** ./src/add-question.ts ***!
  \*****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ AddNewQuestionTypeSelectorViewModel:
                                    () =>
                                        /* reexport safe */ _add_question_type_selector__WEBPACK_IMPORTED_MODULE_1__.AddNewQuestionTypeSelectorViewModel,
                                /* harmony export */ AddNewQuestionViewModel:
                                    () => /* binding */ AddNewQuestionViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var _add_question_type_selector__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! ./add-question-type-selector */ "./src/add-question-type-selector.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./add-question.html */ "./src/add-question.html"
                        );
                        var AddNewQuestionViewModel;

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-add-new-question-btn",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        return {
                                            data: params.item.data,
                                            buttonClass:
                                                params.buttonClass || "svc-btn",
                                            renderPopup:
                                                params.renderPopup === undefined
                                                    ? true
                                                    : params.renderPopup,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/cell-question-dropdown.ts":
                    /*!************************************************!*\
  !*** ./src/adorners/cell-question-dropdown.ts ***!
  \************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var _question__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! ./question */ "./src/adorners/question.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./cell-question-dropdown.html */ "./src/adorners/cell-question-dropdown.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-cell-dropdown-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return (0,
                                        _question__WEBPACK_IMPORTED_MODULE_1__.createQuestionViewModel)(
                                            params,
                                            componentInfo
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/cell-question.ts":
                    /*!***************************************!*\
  !*** ./src/adorners/cell-question.ts ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var _question__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! ./question */ "./src/adorners/question.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./cell-question.html */ "./src/adorners/cell-question.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-cell-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return (0,
                                        _question__WEBPACK_IMPORTED_MODULE_1__.createQuestionViewModel)(
                                            params,
                                            componentInfo
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/image-item-value.ts":
                    /*!******************************************!*\
  !*** ./src/adorners/image-item-value.ts ***!
  \******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./image-item-value.html */ "./src/adorners/image-item-value.html"
                        );
                        var KnockoutImageItemValueWrapperViewModel =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    KnockoutImageItemValueWrapperViewModel,
                                    _super
                                );
                                function KnockoutImageItemValueWrapperViewModel(
                                    creator,
                                    question,
                                    item,
                                    templateData,
                                    itemsRoot
                                ) {
                                    var _this =
                                        _super.call(
                                            this,
                                            creator,
                                            question,
                                            item,
                                            templateData,
                                            itemsRoot
                                        ) || this;
                                    _this.question = question;
                                    _this.item = item;
                                    _this.templateData = templateData;
                                    _this.dragleave = function (_, event) {
                                        _this.onDragLeave(event);
                                    };
                                    _this.drop = function (_, event) {
                                        _this.onDrop(event);
                                    };
                                    _this.dragover = function (_, event) {
                                        _this.onDragOver(event);
                                    };
                                    return _this;
                                }
                                Object.defineProperty(
                                    KnockoutImageItemValueWrapperViewModel.prototype,
                                    "showDragDropGhostOnTop",
                                    {
                                        get: function () {
                                            return this.ghostPosition === "top";
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                Object.defineProperty(
                                    KnockoutImageItemValueWrapperViewModel.prototype,
                                    "showDragDropGhostOnBottom",
                                    {
                                        get: function () {
                                            return (
                                                this.ghostPosition === "bottom"
                                            );
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                Object.defineProperty(
                                    KnockoutImageItemValueWrapperViewModel.prototype,
                                    "attributes",
                                    {
                                        get: function () {
                                            return this.isDraggable
                                                ? {
                                                      "data-sv-drop-target-item-value":
                                                          this.item.value,
                                                  }
                                                : null;
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                KnockoutImageItemValueWrapperViewModel.prototype.blockEvent =
                                    function (_, event) {
                                        event.stopPropagation();
                                    };
                                KnockoutImageItemValueWrapperViewModel.prototype.getNewItemStyle =
                                    function () {
                                        var needStyle =
                                            !this.getIsNewItemSingle();
                                        return {
                                            width: needStyle
                                                ? this.question
                                                      .renderedImageWidth
                                                : undefined,
                                            height: needStyle
                                                ? this.question
                                                      .renderedImageHeight
                                                : undefined,
                                        };
                                    };
                                return KnockoutImageItemValueWrapperViewModel;
                            })(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.ImageItemValueWrapperViewModel
                            );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-image-item-value",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var creator =
                                            params.componentData.creator;
                                        var question =
                                            params.componentData.question;
                                        var item = params.templateData.data;
                                        var model =
                                            new KnockoutImageItemValueWrapperViewModel(
                                                creator,
                                                question,
                                                item,
                                                params.templateData,
                                                componentInfo.element.nextSibling
                                            );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/item-value.ts":
                    /*!************************************!*\
  !*** ./src/adorners/item-value.ts ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./item-value.html */ "./src/adorners/item-value.html"
                        );
                        var KnockoutItemValueWrapperViewModel =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    KnockoutItemValueWrapperViewModel,
                                    _super
                                );
                                function KnockoutItemValueWrapperViewModel(
                                    creator,
                                    question,
                                    item,
                                    templateData
                                ) {
                                    var _this =
                                        _super.call(
                                            this,
                                            creator,
                                            question,
                                            item
                                        ) || this;
                                    _this.question = question;
                                    _this.item = item;
                                    _this.templateData = templateData;
                                    return _this;
                                }
                                KnockoutItemValueWrapperViewModel.prototype.koOnFocusOut =
                                    function (sender, event) {
                                        this.onFocusOut(event);
                                    };
                                Object.defineProperty(
                                    KnockoutItemValueWrapperViewModel.prototype,
                                    "attributes",
                                    {
                                        get: function () {
                                            return this.isDraggable
                                                ? {
                                                      "data-sv-drop-target-item-value":
                                                          this.item.value,
                                                  }
                                                : null;
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                return KnockoutItemValueWrapperViewModel;
                            })(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.ItemValueWrapperViewModel
                            );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-item-value",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var creator =
                                            params.componentData.creator;
                                        var question =
                                            params.componentData.question;
                                        var item = params.templateData.data;
                                        var model =
                                            new KnockoutItemValueWrapperViewModel(
                                                creator,
                                                question,
                                                item,
                                                params.templateData
                                            );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/matrix-cell.ts":
                    /*!*************************************!*\
  !*** ./src/adorners/matrix-cell.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./matrix-cell.html */ "./src/adorners/matrix-cell.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-matrix-cell",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var _a;
                                        var creator =
                                            params.componentData.creator;
                                        var question =
                                            params.componentData.question;
                                        var row = params.componentData.row;
                                        var column =
                                            params.componentData.column;
                                        var element =
                                            params.componentData.element;
                                        params.templateData["nodes"] =
                                            componentInfo.templateNodes;
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.MatrixCellWrapperViewModel(
                                                creator,
                                                params.templateData,
                                                question,
                                                row,
                                                column ||
                                                    ((_a = element.cell) ===
                                                        null || _a === void 0
                                                        ? void 0
                                                        : _a.column)
                                            );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/panel.ts":
                    /*!*******************************!*\
  !*** ./src/adorners/panel.ts ***!
  \*******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ createPanelViewModel: () =>
                                    /* binding */ createPanelViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var _events__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(
                                /*! ../events */ "./src/events.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./panel.html */ "./src/adorners/panel.html"
                        );
                        function createPanelViewModel(
                            params,
                            componentInfo,
                            model
                        ) {
                            if (!model) {
                                model =
                                    new survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.QuestionAdornerViewModel(
                                        params.componentData,
                                        params.templateData.data,
                                        params.templateData
                                    );
                            }
                            model["koSelect"] = function (model, event) {
                                return model.select(
                                    model,
                                    new _events__WEBPACK_IMPORTED_MODULE_4__.KnockoutMouseEvent(
                                        event
                                    )
                                );
                            };
                            model["koIsEmptyElement"] =
                                knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                    function () {
                                        if (
                                            model.element instanceof
                                            survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionHtmlModel
                                        ) {
                                            return !model.element.locHtml[
                                                "koRenderedHtml"
                                            ]();
                                        }
                                        return model.isEmptyElement;
                                    }
                                );
                            model["adornerComponent"] = undefined;
                            new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                model
                            );
                            knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                componentInfo.element,
                                function () {
                                    model.dispose();
                                }
                            );
                            return model;
                        }
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-panel",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return createPanelViewModel(
                                            params,
                                            componentInfo
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/question-banner.ts":
                    /*!*****************************************!*\
  !*** ./src/adorners/question-banner.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./question-banner.html */ "./src/adorners/question-banner.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-question-banner",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params.createBannerParams();
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/question-dropdown.ts":
                    /*!*******************************************!*\
  !*** ./src/adorners/question-dropdown.ts ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var _question__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! ./question */ "./src/adorners/question.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./question-dropdown.html */ "./src/adorners/question-dropdown.html"
                        );
                        var questionTemplate = __webpack_require__(
                            /*! ./question.html */ "./src/adorners/question.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-dropdown-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.QuestionDropdownAdornerViewModel(
                                                params.componentData,
                                                params.templateData.data,
                                                params.templateData
                                            );
                                        (0,
                                        _question__WEBPACK_IMPORTED_MODULE_2__.createQuestionViewModel)(
                                            params,
                                            componentInfo,
                                            model
                                        );
                                        model["adornerComponent"] =
                                            "svc-dropdown-question-adorner";
                                        return model;
                                    },
                                },
                                template: questionTemplate.default,
                            }
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-dropdown-question-adorner",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params.model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/question-image.ts":
                    /*!****************************************!*\
  !*** ./src/adorners/question-image.ts ***!
  \****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var _question__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! ./question */ "./src/adorners/question.ts"
                            );

                        var questionTemplate = __webpack_require__(
                            /*! ./question.html */ "./src/adorners/question.html"
                        );
                        var template = __webpack_require__(
                            /*! ./question-image.html */ "./src/adorners/question-image.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-image-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.QuestionImageAdornerViewModel(
                                                params.componentData,
                                                params.templateData.data,
                                                params.templateData
                                            );
                                        model.rootElement =
                                            componentInfo.element.parentElement;
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                model.rootElement = undefined;
                                            }
                                        );
                                        (0,
                                        _question__WEBPACK_IMPORTED_MODULE_2__.createQuestionViewModel)(
                                            params,
                                            componentInfo,
                                            model
                                        );
                                        model["adornerComponent"] =
                                            "svc-image-question-adorner";
                                        model["koIsEmptyImageLink"] =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                                function () {
                                                    return model.isEmptyImageLink;
                                                }
                                            );
                                        model["koIsEmptyElement"] =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                                function () {
                                                    return model.isEmptyImageLink;
                                                }
                                            );
                                        model["placeholderComponentData"] = {
                                            name: "survey-question-file",
                                            data: model.filePresentationModel,
                                            afterRender:
                                                model.filePresentationModel
                                                    .koQuestionAfterRender,
                                        };
                                        return model;
                                    },
                                },
                                template: questionTemplate.default,
                            }
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-image-question-adorner",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params.model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/question-rating.ts":
                    /*!*****************************************!*\
  !*** ./src/adorners/question-rating.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./question-rating.html */ "./src/adorners/question-rating.html"
                        );
                        var questionTemplate = __webpack_require__(
                            /*! ./question.html */ "./src/adorners/question.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-rating-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_0__.QuestionRatingAdornerViewModel(
                                                params.componentData,
                                                params.templateData.data,
                                                params.templateData
                                            );
                                        // createQuestionViewModel(params, componentInfo, model);
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            model
                                        );
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                model.dispose();
                                            }
                                        );
                                        //model["adornerComponent"] = "svc-rating-question-adorner";
                                        return model;
                                    },
                                },
                                template: questionTemplate.default,
                            }
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-rating-question-content",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_0__.QuestionRatingAdornerViewModel(
                                                params.componentData,
                                                params.templateData.data,
                                                params.templateData
                                            );
                                        //createQuestionViewModel(params, componentInfo, model);
                                        //model["adornerComponent"] = "svc-rating-question-adorner";
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/adorners/question.ts":
                    /*!**********************************!*\
  !*** ./src/adorners/question.ts ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ createQuestionViewModel:
                                    () => /* binding */ createQuestionViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var _events__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(
                                /*! ../events */ "./src/events.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./question.html */ "./src/adorners/question.html"
                        );
                        function createQuestionViewModel(
                            params,
                            componentInfo,
                            model
                        ) {
                            if (!model) {
                                model =
                                    new survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.QuestionAdornerViewModel(
                                        params.componentData,
                                        params.templateData.data,
                                        params.templateData
                                    );
                            }
                            model["koSelect"] = function (model, event) {
                                return model.select(
                                    model,
                                    new _events__WEBPACK_IMPORTED_MODULE_4__.KnockoutMouseEvent(
                                        event
                                    )
                                );
                            };
                            model["koIsEmptyElement"] =
                                knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                    function () {
                                        if (
                                            model.element instanceof
                                            survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionHtmlModel
                                        ) {
                                            return !model.element.locHtml[
                                                "koRenderedHtml"
                                            ]();
                                        }
                                        return model.isEmptyElement;
                                    }
                                );
                            model["adornerComponent"] = undefined;
                            var implementor =
                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                    model
                                );
                            knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                componentInfo.element,
                                function () {
                                    implementor.dispose();
                                }
                            );
                            return model;
                        }
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return createQuestionViewModel(
                                            params,
                                            componentInfo
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/components/surface-placeholder.ts":
                    /*!***********************************************!*\
  !*** ./src/components/surface-placeholder.ts ***!
  \***********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ SurfacePlaceholderViewModel:
                                    () =>
                                        /* binding */ SurfacePlaceholderViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./surface-placeholder.html */ "./src/components/surface-placeholder.html"
                        );
                        var SurfacePlaceholderViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-surface-placeholder",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/creator.ts":
                    /*!************************!*\
  !*** ./src/creator.ts ***!
  \************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ SurveyCreator: () =>
                                    /* binding */ SurveyCreator,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        if (!!knockout__WEBPACK_IMPORTED_MODULE_1__.options) {
                            knockout__WEBPACK_IMPORTED_MODULE_1__.options.useOnlyNativeEvents = true;
                        }
                        var SurveyCreator = /** @class */ (function (_super) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                SurveyCreator,
                                _super
                            );
                            function SurveyCreator(options, options2) {
                                if (options === void 0) {
                                    options = {};
                                }
                                return (
                                    _super.call(this, options, options2) || this
                                );
                            }
                            SurveyCreator.prototype.createSurveyCore =
                                function (json, reason) {
                                    if (json === void 0) {
                                        json = {};
                                    }
                                    return new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.Survey(
                                        json
                                    );
                                };
                            SurveyCreator.prototype.onViewTypeChanged =
                                function (newType) {
                                    var plugin = this.plugins[newType];
                                    !!plugin && plugin.activate();
                                };
                            SurveyCreator.prototype.render = function (target) {
                                var node = target;
                                if (typeof target === "string") {
                                    node = document.getElementById(target);
                                }
                                node.innerHTML =
                                    '<survey-creator params="creator: creator"></survey-creator>';
                                knockout__WEBPACK_IMPORTED_MODULE_1__.cleanNode(
                                    node
                                );
                                knockout__WEBPACK_IMPORTED_MODULE_1__.applyBindings(
                                    { creator: this },
                                    node
                                );
                            };
                            return SurveyCreator;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.SurveyCreatorModel
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/boolean-switch.ts":
                    /*!************************************************!*\
  !*** ./src/custom-questions/boolean-switch.ts ***!
  \************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ SwitchViewModel: () =>
                                    /* binding */ SwitchViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./boolean-switch.html */ "./src/custom-questions/boolean-switch.html"
                        );
                        var SwitchViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "sv-boolean-switch",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return { question: params.question };
                                    },
                                },
                                template: template.default,
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "boolean",
                            "switch",
                            "sv-boolean-switch"
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/color-item.ts":
                    /*!********************************************!*\
  !*** ./src/custom-questions/color-item.ts ***!
  \********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ ColorItemViewModel: () =>
                                    /* binding */ ColorItemViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./color-item.html */ "./src/custom-questions/color-item.html"
                        );
                        var ColorItemViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "color-item",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return {
                                            item: params.item,
                                            getSwatchStyle: function () {
                                                return {
                                                    backgroundColor:
                                                        params.item.value,
                                                };
                                            },
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/question-color.ts":
                    /*!************************************************!*\
  !*** ./src/custom-questions/question-color.ts ***!
  \************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionColor: () =>
                                    /* binding */ QuestionColor,
                                /* harmony export */ QuestionColorImplementor:
                                    () =>
                                        /* binding */ QuestionColorImplementor,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_4__
                            );

                        var template = __webpack_require__(
                            /*! ./question-color.html */ "./src/custom-questions/question-color.html"
                        );
                        // import template from "./question-editor-content.html";
                        var QuestionColorImplementor = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionColorImplementor,
                                _super
                            );
                            function QuestionColorImplementor(question) {
                                var _this = _super.call(this, question) || this;
                                _this.setCallbackFunc(
                                    "koOnBlur",
                                    function (_, event) {
                                        _this.question.onBlur(event);
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koOnChange",
                                    function (_, event) {
                                        _this.question.onChange(event);
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koOnBeforeInput",
                                    function (_, event) {
                                        _this.question.onBeforeInput(event);
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koOnColorInputChange",
                                    function (_, event) {
                                        _this.question.onColorInputChange(
                                            event
                                        );
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koOnKeyUp",
                                    function (_, event) {
                                        _this.question.onKeyUp(event);
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koOnKeyDown",
                                    function (_, event) {
                                        _this.question.onKeyDown(event);
                                        return true;
                                    }
                                );
                                _this.setCallbackFunc(
                                    "koDropdownAction",
                                    function () {
                                        var dropdownAction =
                                            _this.question.dropdownAction;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                            dropdownAction
                                        );
                                        return dropdownAction;
                                    }
                                );
                                _this.setObservaleObj(
                                    "koReadOnlyValue",
                                    knockout__WEBPACK_IMPORTED_MODULE_4__.computed(
                                        function () {
                                            return _this.question.renderedValue;
                                        }
                                    )
                                );
                                return _this;
                            }
                            return QuestionColorImplementor;
                        })(
                            survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.QuestionImplementor
                        );

                        var QuestionColor = /** @class */ (function (_super) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionColor,
                                _super
                            );
                            function QuestionColor(name) {
                                var _this = _super.call(this, name) || this;
                                _this.renderAs = "color";
                                return _this;
                            }
                            QuestionColor.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new QuestionColorImplementor(this);
                                };
                            QuestionColor.prototype.dispose = function () {
                                this._implementor.dispose();
                                this._implementor = undefined;
                                _super.prototype.dispose.call(this);
                            };
                            return QuestionColor;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.QuestionColorModel
                        );

                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "color",
                            function () {
                                return new QuestionColor("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "color",
                            function (name) {
                                return new QuestionColor(name);
                            },
                            false
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "color",
                            "color",
                            "svc-color-question"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_4__.components.register(
                            "svc-color-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/question-file.ts":
                    /*!***********************************************!*\
  !*** ./src/custom-questions/question-file.ts ***!
  \***********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionFileEditor: () =>
                                    /* binding */ QuestionFileEditor,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_4__
                            );

                        var template = __webpack_require__(
                            /*! ./question-file.html */ "./src/custom-questions/question-file.html"
                        );
                        function getOriginalEvent(event) {
                            return event.originalEvent || event;
                        }
                        var QuestionFileEditorImplementor =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    QuestionFileEditorImplementor,
                                    _super
                                );
                                function QuestionFileEditorImplementor(
                                    question
                                ) {
                                    var _this =
                                        _super.call(this, question) || this;
                                    _this.setObservaleObj(
                                        "koInputTitle",
                                        knockout__WEBPACK_IMPORTED_MODULE_4__.observable()
                                    );
                                    _this.setCallbackFunc(
                                        "ondrop",
                                        function (data, event) {
                                            _this.question.onDrop(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "ondragover",
                                        function (data, event) {
                                            _this.question.onDragOver(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "ondragenter",
                                        function (data, event) {
                                            _this.question.onDragEnter(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "ondragleave",
                                        function (data, event) {
                                            _this.question.onDragLeave(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "doFileInputChange",
                                        function (data, event) {
                                            _this.question.onFileInputChange(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "doclean",
                                        function (data, event) {
                                            _this.question.doClean(
                                                getOriginalEvent(event)
                                            );
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnKeyDown",
                                        function (_, event) {
                                            _this.question.onKeyDown(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnBeforeInput",
                                        function (_, event) {
                                            _this.question.onInputBlur(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnInputChange",
                                        function (_, event) {
                                            _this.question.onInputChange(event);
                                            return true;
                                        }
                                    );
                                    _this.setObservaleObj(
                                        "koReadOnlyValue",
                                        knockout__WEBPACK_IMPORTED_MODULE_4__.computed(
                                            function () {
                                                return _this.question
                                                    .renderedValue;
                                            }
                                        )
                                    );
                                    return _this;
                                }
                                return QuestionFileEditorImplementor;
                            })(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.QuestionImplementor
                            );
                        var QuestionFileEditor = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionFileEditor,
                                _super
                            );
                            function QuestionFileEditor(name) {
                                var _this = _super.call(this, name) || this;
                                _this.renderAs = "fileedit";
                                return _this;
                            }
                            QuestionFileEditor.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new QuestionFileEditorImplementor(this);
                                };
                            QuestionFileEditor.prototype.dispose = function () {
                                this.onUploadStateChanged.remove(
                                    this.updateState
                                );
                                this._implementor.dispose();
                                this._implementor = undefined;
                                _super.prototype.dispose.call(this);
                            };
                            return QuestionFileEditor;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.QuestionFileEditorModel
                        );

                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "fileedit",
                            function () {
                                return new QuestionFileEditor("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "fileedit",
                            function (name) {
                                return new QuestionFileEditor(name);
                            },
                            false
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "fileedit",
                            "fileedit",
                            "svc-file-edit-question"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_4__.components.register(
                            "svc-file-edit-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/spin-editor.ts":
                    /*!*********************************************!*\
  !*** ./src/custom-questions/spin-editor.ts ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionSpinEditor: () =>
                                    /* binding */ QuestionSpinEditor,
                                /* harmony export */ QuestionSpinEditorImplementor:
                                    () =>
                                        /* binding */ QuestionSpinEditorImplementor,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_4___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_4__
                            );

                        var template = __webpack_require__(
                            /*! ./spin-editor.html */ "./src/custom-questions/spin-editor.html"
                        );
                        // import template from "./question-editor-content.html";
                        var QuestionSpinEditorImplementor =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    QuestionSpinEditorImplementor,
                                    _super
                                );
                                function QuestionSpinEditorImplementor(
                                    question
                                ) {
                                    var _this =
                                        _super.call(this, question) || this;
                                    _this.setCallbackFunc(
                                        "koOnFocus",
                                        function (_, event) {
                                            _this.question.onFocus(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnBlur",
                                        function (_, event) {
                                            _this.question.onBlur(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnKeyDown",
                                        function (_, event) {
                                            _this.question.onKeyDown(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnInputKeyDown",
                                        function (_, event) {
                                            _this.question.onInputKeyDown(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnKeyUp",
                                        function (_, event) {
                                            _this.question.onKeyUp(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnChange",
                                        function (_, event) {
                                            _this.question.onChange(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnCompositeUpdate",
                                        function (_, event) {
                                            _this.question.onCompositionUpdate(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koIncrease",
                                        function (_, event) {
                                            _this.question.increase();
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koDecrease",
                                        function (_, event) {
                                            _this.question.decrease();
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnBeforeInput",
                                        function (_, event) {
                                            _this.question.onBeforeInput(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnDownButtonMouseDown",
                                        function (_, event) {
                                            _this.question.onDownButtonMouseDown(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnUpButtonMouseDown",
                                        function (_, event) {
                                            _this.question.onUpButtonMouseDown(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnDownButtonMouseDown",
                                        function (_, event) {
                                            _this.question.onDownButtonMouseDown(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnButtonMouseUp",
                                        function (_, event) {
                                            _this.question.onButtonMouseUp(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnButtonMouseLeave",
                                        function (_, event) {
                                            _this.question.onButtonMouseLeave(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setObservaleObj(
                                        "koReadOnlyValue",
                                        knockout__WEBPACK_IMPORTED_MODULE_4__.computed(
                                            function () {
                                                return _this.question
                                                    .renderedValue;
                                            }
                                        )
                                    );
                                    return _this;
                                }
                                return QuestionSpinEditorImplementor;
                            })(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.QuestionImplementor
                            );

                        var QuestionSpinEditor = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionSpinEditor,
                                _super
                            );
                            function QuestionSpinEditor(name) {
                                var _this = _super.call(this, name) || this;
                                _this.renderAs = "spinedit";
                                return _this;
                            }
                            QuestionSpinEditor.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new QuestionSpinEditorImplementor(this);
                                };
                            QuestionSpinEditor.prototype.dispose = function () {
                                this._implementor.dispose();
                                this._implementor = undefined;
                                _super.prototype.dispose.call(this);
                            };
                            return QuestionSpinEditor;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.QuestionSpinEditorModel
                        );

                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "spinedit",
                            function () {
                                return new QuestionSpinEditor("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "spinedit",
                            function (name) {
                                return new QuestionSpinEditor(name);
                            },
                            false
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "spinedit",
                            "spinedit",
                            "svc-spin-editor"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_4__.components.register(
                            "svc-spin-editor",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/custom-questions/text-with-reset.ts":
                    /*!*************************************************!*\
  !*** ./src/custom-questions/text-with-reset.ts ***!
  \*************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionCommentWithReset:
                                    () =>
                                        /* binding */ QuestionCommentWithReset,
                                /* harmony export */ QuestionTextWithReset:
                                    () => /* binding */ QuestionTextWithReset,
                                /* harmony export */ QuestionTextWithResetImplementor:
                                    () =>
                                        /* binding */ QuestionTextWithResetImplementor,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_3__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__
                            );

                        var template = __webpack_require__(
                            /*! ./text-with-reset.html */ "./src/custom-questions/text-with-reset.html"
                        );
                        // import template from "./question-editor-content.html";
                        var QuestionTextWithResetImplementor =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    QuestionTextWithResetImplementor,
                                    _super
                                );
                                function QuestionTextWithResetImplementor(
                                    question
                                ) {
                                    var _this =
                                        _super.call(this, question) || this;
                                    _this.setCallbackFunc(
                                        "koOnFocus",
                                        function (_, event) {
                                            _this.question.onFocus(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnBlur",
                                        function (_, event) {
                                            _this.question.onBlur(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnKeyDown",
                                        function (_, event) {
                                            _this.question.onKeyDown(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnKeyUp",
                                        function (_, event) {
                                            _this.question.onKeyUp(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnChange",
                                        function (_, event) {
                                            _this.question.onChange(event);
                                            return true;
                                        }
                                    );
                                    _this.setCallbackFunc(
                                        "koOnCompositeUpdate",
                                        function (_, event) {
                                            _this.question.onCompositionUpdate(
                                                event
                                            );
                                            return true;
                                        }
                                    );
                                    _this.setObservaleObj(
                                        "koReadOnlyValue",
                                        knockout__WEBPACK_IMPORTED_MODULE_3__.computed(
                                            function () {
                                                return _this.question.value;
                                            }
                                        )
                                    );
                                    return _this;
                                }
                                return QuestionTextWithResetImplementor;
                            })(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__.QuestionImplementor
                            );

                        var QuestionTextWithReset = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionTextWithReset,
                                _super
                            );
                            function QuestionTextWithReset(name) {
                                return _super.call(this, name) || this;
                            }
                            QuestionTextWithReset.prototype.createResetValueAdorner =
                                function () {
                                    var adorner =
                                        new survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.ResetValueAdorner(
                                            this
                                        );
                                    this._adornerImplementor =
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__.ImplementorBase(
                                            adorner
                                        );
                                    return adorner;
                                };
                            QuestionTextWithReset.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new QuestionTextWithResetImplementor(
                                            this
                                        );
                                };
                            QuestionTextWithReset.prototype.dispose =
                                function () {
                                    this._implementor.dispose();
                                    this._adornerImplementor.dispose();
                                    this._adornerImplementor = undefined;
                                    this._implementor = undefined;
                                    _super.prototype.dispose.call(this);
                                };
                            return QuestionTextWithReset;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.QuestionTextWithResetModel
                        );

                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "textwithreset",
                            function () {
                                return new QuestionTextWithReset("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "textwithreset",
                            function (name) {
                                return new QuestionTextWithReset(name);
                            },
                            false
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "textwithreset",
                            "textwithreset",
                            "svc-text-with-reset"
                        );
                        var QuestionCommentWithReset = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionCommentWithReset,
                                _super
                            );
                            function QuestionCommentWithReset(name) {
                                var _this = _super.call(this, name) || this;
                                _this.renderAs = "commentwithreset";
                                return _this;
                            }
                            QuestionCommentWithReset.prototype.createResetValueAdorner =
                                function () {
                                    var adorner =
                                        new survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.ResetValueAdorner(
                                            this
                                        );
                                    this._adornerImplementor =
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__.ImplementorBase(
                                            adorner
                                        );
                                    return adorner;
                                };
                            QuestionCommentWithReset.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_4__.QuestionImplementor(
                                            this
                                        );
                                };
                            QuestionCommentWithReset.prototype.dispose =
                                function () {
                                    this._implementor.dispose();
                                    this._adornerImplementor.dispose();
                                    this._adornerImplementor = undefined;
                                    this._implementor = undefined;
                                    _super.prototype.dispose.call(this);
                                };
                            return QuestionCommentWithReset;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.QuestionCommentWithResetModel
                        );

                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "commentwithreset",
                            function () {
                                return new QuestionCommentWithReset("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "commentwithreset",
                            function (name) {
                                return new QuestionCommentWithReset(name);
                            },
                            false
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "commentwithreset",
                            "commentwithreset",
                            "svc-text-with-reset"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_3__.components.register(
                            "svc-text-with-reset",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/entries/helpers.ts":
                    /*!********************************!*\
  !*** ./src/entries/helpers.ts ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ __assign: () =>
                                    /* binding */ __assign,
                                /* harmony export */ __decorate: () =>
                                    /* binding */ __decorate,
                                /* harmony export */ __extends: () =>
                                    /* binding */ __extends,
                                /* harmony export */ __spreadArrays: () =>
                                    /* binding */ __spreadArrays,
                                /* harmony export */
                            }
                        );
                        var __decorate = function (
                            decorators,
                            target,
                            key,
                            desc
                        ) {
                            var c = arguments.length,
                                r =
                                    c < 3
                                        ? target
                                        : desc === null
                                        ? (desc =
                                              Object.getOwnPropertyDescriptor(
                                                  target,
                                                  key
                                              ))
                                        : desc,
                                d;
                            if (
                                typeof Reflect === "object" &&
                                typeof Reflect.decorate === "function"
                            )
                                r = Reflect.decorate(
                                    decorators,
                                    target,
                                    key,
                                    desc
                                );
                            else
                                for (var i = decorators.length - 1; i >= 0; i--)
                                    if ((d = decorators[i]))
                                        r =
                                            (c < 3
                                                ? d(r)
                                                : c > 3
                                                ? d(target, key, r)
                                                : d(target, key)) || r;
                            return (
                                c > 3 &&
                                    r &&
                                    Object.defineProperty(target, key, r),
                                r
                            );
                        };
                        var __assign =
                            Object["assign"] ||
                            function (target) {
                                for (
                                    var s, i = 1, n = arguments.length;
                                    i < n;
                                    i++
                                ) {
                                    s = arguments[i];
                                    for (var p in s)
                                        if (
                                            Object.prototype.hasOwnProperty.call(
                                                s,
                                                p
                                            )
                                        )
                                            target[p] = s[p];
                                }
                                return target;
                            };
                        function __extends(thisClass, baseClass) {
                            for (var p in baseClass)
                                if (baseClass.hasOwnProperty(p))
                                    thisClass[p] = baseClass[p];
                            function __() {
                                this.constructor = thisClass;
                            }
                            thisClass.prototype =
                                baseClass === null
                                    ? Object.create(baseClass)
                                    : ((__.prototype = baseClass.prototype),
                                      new __());
                        }
                        var __spreadArrays = function () {
                            for (
                                var s = 0, i = 0, il = arguments.length;
                                i < il;
                                i++
                            )
                                s += arguments[i].length;
                            for (var r = Array(s), k = 0, i = 0; i < il; i++)
                                for (
                                    var a = arguments[i], j = 0, jl = a.length;
                                    j < jl;
                                    j++, k++
                                )
                                    r[k] = a[j];
                            return r;
                        };

                        /***/
                    },

                /***/ "./src/events.ts":
                    /*!***********************!*\
  !*** ./src/events.ts ***!
  \***********************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ KnockoutDragEvent: () =>
                                    /* binding */ KnockoutDragEvent,
                                /* harmony export */ KnockoutMouseEvent: () =>
                                    /* binding */ KnockoutMouseEvent,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );

                        var KnockoutMouseEvent = /** @class */ (function () {
                            function KnockoutMouseEvent(event) {
                                this.event = event;
                            }
                            KnockoutMouseEvent.prototype.stopPropagation =
                                function () {
                                    this.event.stopPropagation();
                                };
                            KnockoutMouseEvent.prototype.preventDefault =
                                function () {
                                    this.event.preventDefault();
                                };
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "cancelBubble",
                                {
                                    get: function () {
                                        return this.event.cancelBubble;
                                    },
                                    set: function (value) {
                                        this.event.cancelBubble = value;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "target",
                                {
                                    get: function () {
                                        return this.event.target;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "currentTarget",
                                {
                                    get: function () {
                                        return this.event.currentTarget;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "clientX",
                                {
                                    get: function () {
                                        return this.event.clientX;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "clientY",
                                {
                                    get: function () {
                                        return this.event.clientY;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "offsetX",
                                {
                                    get: function () {
                                        return this.event.offsetX;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                KnockoutMouseEvent.prototype,
                                "offsetY",
                                {
                                    get: function () {
                                        return this.event.offsetY;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            return KnockoutMouseEvent;
                        })();

                        var KnockoutDragEvent = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                KnockoutDragEvent,
                                _super
                            );
                            function KnockoutDragEvent(event) {
                                var _this = _super.call(this, event) || this;
                                _this.event = event;
                                return _this;
                            }
                            Object.defineProperty(
                                KnockoutDragEvent.prototype,
                                "dataTransfer",
                                {
                                    get: function () {
                                        return this.event.dataTransfer;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            return KnockoutDragEvent;
                        })(KnockoutMouseEvent);

                        /***/
                    },

                /***/ "./src/header/logo-image.ts":
                    /*!**********************************!*\
  !*** ./src/header/logo-image.ts ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./logo-image.html */ "./src/header/logo-image.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-logo-image",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.LogoImageViewModel(
                                                params,
                                                componentInfo.element.nextElementSibling
                                            );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/page-navigator/page-navigator-item.ts":
                    /*!***************************************************!*\
  !*** ./src/page-navigator/page-navigator-item.ts ***!
  \***************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ PageNavigatorItemViewModel:
                                    () =>
                                        /* binding */ PageNavigatorItemViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./page-navigator-item.html */ "./src/page-navigator/page-navigator-item.html"
                        );
                        // import template from "./page-navigator-item.html";
                        var PageNavigatorItemViewModel =
                            /** @class */ (function () {
                                function PageNavigatorItemViewModel(item) {
                                    var _this = this;
                                    this.item = item;
                                    this.action = function (data, event) {
                                        if (!_this.disabled) {
                                            _this.item.action();
                                            event.stopPropagation();
                                            event.preventDefault();
                                        }
                                    };
                                }
                                Object.defineProperty(
                                    PageNavigatorItemViewModel.prototype,
                                    "text",
                                    {
                                        get: function () {
                                            return this.item.title;
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                PageNavigatorItemViewModel.prototype.unwrap =
                                    function (value) {
                                        if (typeof value !== "function") {
                                            return value;
                                        } else {
                                            return value();
                                        }
                                    };
                                Object.defineProperty(
                                    PageNavigatorItemViewModel.prototype,
                                    "active",
                                    {
                                        get: function () {
                                            return !!this.unwrap(
                                                this.item.active
                                            );
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                Object.defineProperty(
                                    PageNavigatorItemViewModel.prototype,
                                    "disabled",
                                    {
                                        get: function () {
                                            var isEnabled = this.item.enabled;
                                            if (isEnabled === undefined)
                                                return false;
                                            return !knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                isEnabled
                                            );
                                        },
                                        enumerable: false,
                                        configurable: true,
                                    }
                                );
                                return PageNavigatorItemViewModel;
                            })();

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-page-navigator-item",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return new PageNavigatorItemViewModel(
                                            params.item
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/page-navigator/page-navigator.ts":
                    /*!**********************************************!*\
  !*** ./src/page-navigator/page-navigator.ts ***!
  \**********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ PageNavigatorView: () =>
                                    /* binding */ PageNavigatorView,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./page-navigator.html */ "./src/page-navigator/page-navigator.html"
                        );
                        // import template from "./page-navigator.html";
                        var PageNavigatorView = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                PageNavigatorView,
                                _super
                            );
                            function PageNavigatorView(
                                pagesController,
                                pageEditMode
                            ) {
                                return (
                                    _super.call(
                                        this,
                                        pagesController,
                                        pageEditMode
                                    ) || this
                                );
                            }
                            PageNavigatorView.prototype.createActionBarCore =
                                function (item) {
                                    var res =
                                        _super.prototype.createActionBarCore.call(
                                            this,
                                            item
                                        );
                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                        res
                                    );
                                    return res;
                                };
                            return PageNavigatorView;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.PageNavigatorViewModel
                        );

                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-page-navigator",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = new PageNavigatorView(
                                            params.controller,
                                            params.pageEditMode
                                        );
                                        model.setItemsContainer(
                                            componentInfo.element.parentElement
                                        );
                                        var implementor =
                                            new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                                model
                                            );
                                        var scrollableViewPort =
                                            componentInfo.element.parentElement
                                                .parentElement.parentElement;
                                        model.setScrollableContainer(
                                            scrollableViewPort
                                        );
                                        if (params.pageEditMode !== "bypage") {
                                            scrollableViewPort.onscroll =
                                                function (ev) {
                                                    return model.onContainerScroll(
                                                        ev.currentTarget
                                                    );
                                                };
                                        }
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                scrollableViewPort.onscroll =
                                                    undefined;
                                                model.dispose();
                                                implementor.dispose();
                                            }
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/page.ts":
                    /*!*********************!*\
  !*** ./src/page.ts ***!
  \*********************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ CreatorSurveyPageComponent:
                                    () =>
                                        /* binding */ CreatorSurveyPageComponent,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./page.html */ "./src/page.html"
                        );
                        var CreatorSurveyPageComponent =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    CreatorSurveyPageComponent,
                                    _super
                                );
                                function CreatorSurveyPageComponent(
                                    creator,
                                    _page
                                ) {
                                    var _this =
                                        _super.call(
                                            this,
                                            creator,
                                            knockout__WEBPACK_IMPORTED_MODULE_1__.unwrap(
                                                _page
                                            )
                                        ) || this;
                                    _this._page = _page;
                                    if (
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.isSubscribable(
                                            _page
                                        )
                                    ) {
                                        _this.pageUpdater = _page.subscribe(
                                            function (newPage) {
                                                _this.detachElement(
                                                    _this.currPage
                                                );
                                                _this.currPage = newPage;
                                                _this.attachElement(newPage);
                                            }
                                        );
                                    }
                                    _this.currPage =
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.unwrap(
                                            _page
                                        );
                                    _this._page = _page;
                                    _this.attachElement(_this.page);
                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                        _this
                                    );
                                    return _this;
                                }
                                CreatorSurveyPageComponent.prototype.getPage =
                                    function () {
                                        return (
                                            knockout__WEBPACK_IMPORTED_MODULE_1__.unwrap(
                                                this._page
                                            ) ||
                                            _super.prototype.getPage.call(this)
                                        );
                                    };
                                CreatorSurveyPageComponent.prototype.fixedDispose =
                                    function () {
                                        this.pageUpdater &&
                                            this.pageUpdater.dispose();
                                        _super.prototype.dispose.call(this);
                                        if (
                                            knockout__WEBPACK_IMPORTED_MODULE_1__.isWritableObservable(
                                                this._page
                                            )
                                        ) {
                                            this._page(undefined);
                                        }
                                        this._page = undefined;
                                    };
                                CreatorSurveyPageComponent.prototype.dispose =
                                    function () {};
                                return CreatorSurveyPageComponent;
                            })(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.PageAdorner
                            );

                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-page",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var creator = params.creator;
                                        var pageAdornerViewModel =
                                            new CreatorSurveyPageComponent(
                                                creator,
                                                params.page
                                            );
                                        pageAdornerViewModel.rootElement =
                                            componentInfo.element;
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                pageAdornerViewModel.fixedDispose();
                                            }
                                        );
                                        return pageAdornerViewModel;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/question-editor-content.ts":
                    /*!****************************************!*\
  !*** ./src/question-editor-content.ts ***!
  \****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./question-editor-content.html */ "./src/question-editor-content.html"
                        );
                        // import template from "./question-editor-content.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-question-editor-content",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/question-embedded-survey.ts":
                    /*!*****************************************!*\
  !*** ./src/question-embedded-survey.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionEmbeddedSurvey:
                                    () => /* binding */ QuestionEmbeddedSurvey,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var questionTemplate = __webpack_require__(
                            /*! ./question-embedded-survey.html */ "./src/question-embedded-survey.html"
                        );
                        var QuestionEmbeddedSurvey = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionEmbeddedSurvey,
                                _super
                            );
                            function QuestionEmbeddedSurvey(name) {
                                return _super.call(this, name) || this;
                            }
                            Object.defineProperty(
                                QuestionEmbeddedSurvey.prototype,
                                "currentPageId",
                                {
                                    get: function () {
                                        return !!this.embeddedSurvey.currentPage
                                            ? this.embeddedSurvey.currentPage.id
                                            : "";
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            QuestionEmbeddedSurvey.prototype.onBaseCreating =
                                function () {
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.QuestionImplementor(
                                            this
                                        );
                                };
                            QuestionEmbeddedSurvey.prototype.dispose =
                                function () {
                                    this._implementor.dispose();
                                    this._implementor = undefined;
                                    _super.prototype.dispose.call(this);
                                };
                            return QuestionEmbeddedSurvey;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.QuestionEmbeddedSurveyModel
                        );

                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.SurveyTemplateText().addText(
                            questionTemplate.default,
                            "question",
                            "embeddedsurvey"
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "embeddedsurvey",
                            function () {
                                return new QuestionEmbeddedSurvey("");
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "embeddedsurvey",
                            function (name) {
                                return new QuestionEmbeddedSurvey(name);
                            },
                            false
                        );

                        /***/
                    },

                /***/ "./src/question-link-value.ts":
                    /*!************************************!*\
  !*** ./src/question-link-value.ts ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionLinkValue: () =>
                                    /* binding */ QuestionLinkValue,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var questionTemplate = __webpack_require__(
                            /*! ./question-link-value.html */ "./src/question-link-value.html"
                        );
                        var QuestionLinkValue = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                QuestionLinkValue,
                                _super
                            );
                            function QuestionLinkValue(name, json) {
                                if (json === void 0) {
                                    json = null;
                                }
                                var _this =
                                    _super.call(this, name, json) || this;
                                _this.clearCaption =
                                    survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.editorLocalization.getString(
                                        "pe.clear"
                                    );
                                return _this;
                            }
                            QuestionLinkValue.prototype.onBaseCreating =
                                function () {
                                    var _this = this;
                                    _super.prototype.onBaseCreating.call(this);
                                    this._implementor =
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.QuestionImplementor(
                                            this
                                        );
                                    this.koClickLink = function (model, event) {
                                        event.stopPropagation();
                                        _this.doLinkClick();
                                    };
                                    this.koClearLink = function (model, event) {
                                        event.stopPropagation();
                                        _this.doClearClick();
                                    };
                                };
                            QuestionLinkValue.prototype.dispose = function () {
                                this._implementor.dispose();
                                this._implementor = undefined;
                                _super.prototype.dispose.call(this);
                            };
                            return QuestionLinkValue;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.QuestionLinkValueModel
                        );

                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.SurveyTemplateText().addText(
                            questionTemplate.default,
                            "question",
                            "linkvalue"
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.Serializer.overrideClassCreator(
                            "linkvalue",
                            function (json) {
                                return new QuestionLinkValue("", json);
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.QuestionFactory.Instance.registerQuestion(
                            "linkvalue",
                            function (name) {
                                return new QuestionLinkValue(name);
                            },
                            false
                        );

                        /***/
                    },

                /***/ "./src/question-widget.ts":
                    /*!********************************!*\
  !*** ./src/question-widget.ts ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var _adorners_question__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! ./adorners/question */ "./src/adorners/question.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./question-widget.html */ "./src/question-widget.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-widget-question",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_0__.QuestionAdornerViewModel(
                                                params.componentData,
                                                params.templateData.data,
                                                params.templateData
                                            );
                                        (0,
                                        _adorners_question__WEBPACK_IMPORTED_MODULE_2__.createQuestionViewModel)(
                                            params,
                                            componentInfo,
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/results.ts":
                    /*!************************!*\
  !*** ./src/results.ts ***!
  \************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var templateHtml = __webpack_require__(
                            /*! ./results.html */ "./src/results.html"
                        );
                        var rowTemplateHtml = __webpack_require__(
                            /*! ./results-table-row.html */ "./src/results-table-row.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "survey-results",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var model =
                                            new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.SurveyResultsModel(
                                                knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                    params.survey
                                                )
                                            );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: templateHtml.default,
                            }
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "survey-results-table-row",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var model = params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            model
                                        );
                                        return { model: model };
                                    },
                                },
                                template: rowTemplateHtml.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/row.ts":
                    /*!********************!*\
  !*** ./src/row.ts ***!
  \********************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./row.html */ "./src/row.html"
                        );
                        var KnockoutRowViewModel = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                KnockoutRowViewModel,
                                _super
                            );
                            function KnockoutRowViewModel(
                                creator,
                                row,
                                templateData
                            ) {
                                var _this =
                                    _super.call(
                                        this,
                                        creator,
                                        row,
                                        templateData
                                    ) || this;
                                _this.creator = creator;
                                _this.row = row;
                                _this.templateData = templateData;
                                return _this;
                            }
                            return KnockoutRowViewModel;
                        })(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_2__.RowViewModel
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-row",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var creator =
                                            params.componentData.creator;
                                        var row = params.componentData.row;
                                        var model = new KnockoutRowViewModel(
                                            creator,
                                            row,
                                            params.templateData
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_3__.ImplementorBase(
                                            model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/object-selector.ts":
                    /*!*****************************************!*\
  !*** ./src/side-bar/object-selector.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./object-selector.html */ "./src/side-bar/object-selector.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-object-selector",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model
                                        );
                                        return { model: model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/property-grid-placeholder.ts":
                    /*!***************************************************!*\
  !*** ./src/side-bar/property-grid-placeholder.ts ***!
  \***************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./property-grid-placeholder.html */ "./src/side-bar/property-grid-placeholder.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-property-grid-placeholder",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        return {
                                            title: survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.editorLocalization.getString(
                                                "ed.propertyGridPlaceholderTitle"
                                            ),
                                            description:
                                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.editorLocalization.getString(
                                                    "ed.propertyGridPlaceholderDescription"
                                                ),
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/property-grid.ts":
                    /*!***************************************!*\
  !*** ./src/side-bar/property-grid.ts ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./property-grid.html */ "./src/side-bar/property-grid.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-property-grid",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var subscrib =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                                function () {
                                                    var model =
                                                        knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                            params.model
                                                        );
                                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                                        model
                                                    );
                                                }
                                            );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                subscrib.dispose();
                                            }
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_2__.Serializer.overrideClassCreator(
                            "buttongroup",
                            function () {
                                return new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.QuestionButtonGroup(
                                    ""
                                );
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_2__.QuestionFactory.Instance.registerQuestion(
                            "buttongroup",
                            function (name) {
                                var q =
                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.QuestionButtonGroup(
                                        name
                                    );
                                q.choices =
                                    survey_core__WEBPACK_IMPORTED_MODULE_2__.QuestionFactory.DefaultChoices;
                                return q;
                            },
                            false
                        );

                        /***/
                    },

                /***/ "./src/side-bar/search.ts":
                    /*!********************************!*\
  !*** ./src/side-bar/search.ts ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./search.html */ "./src/side-bar/search.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-search",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model
                                        );
                                        return { model: model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-default-header.ts":
                    /*!*************************************************!*\
  !*** ./src/side-bar/side-bar-default-header.ts ***!
  \*************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./side-bar-default-header.html */ "./src/side-bar/side-bar-default-header.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-side-bar-default-header",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var model = params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-header.ts":
                    /*!*****************************************!*\
  !*** ./src/side-bar/side-bar-header.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./side-bar-header.html */ "./src/side-bar/side-bar-header.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-side-bar-header",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            params.model
                                        );
                                        return {
                                            model: params.model,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-page.ts":
                    /*!***************************************!*\
  !*** ./src/side-bar/side-bar-page.ts ***!
  \***************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./side-bar-page.html */ "./src/side-bar/side-bar-page.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-side-bar-page",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var item = params.item;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            item
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/side-bar-property-grid-header.ts":
                    /*!*******************************************************!*\
  !*** ./src/side-bar/side-bar-property-grid-header.ts ***!
  \*******************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./side-bar-property-grid-header.html */ "./src/side-bar/side-bar-property-grid-header.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-side-bar-property-grid-header",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            params.model
                                        );
                                        return {
                                            model: params.model,
                                            getTarget:
                                                survey_core__WEBPACK_IMPORTED_MODULE_1__.getActionDropdownButtonTarget,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/side-bar.ts":
                    /*!**********************************!*\
  !*** ./src/side-bar/side-bar.ts ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./side-bar.html */ "./src/side-bar/side-bar.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-side-bar",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                params.model
                                            );
                                        model.initResizeManager(
                                            componentInfo.element.getElementsByClassName(
                                                "svc-side-bar__container"
                                            )[0]
                                        );
                                        var subscrib =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                                function () {
                                                    var model =
                                                        knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                            params.model
                                                        );
                                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                                        model
                                                    );
                                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                                        model.header
                                                    );
                                                }
                                            );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                subscrib.dispose();
                                                model.resetResizeManager();
                                            }
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/tab-button.ts":
                    /*!************************************!*\
  !*** ./src/side-bar/tab-button.ts ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./tab-button.html */ "./src/side-bar/tab-button.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-button",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            params.model
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/tab-control.ts":
                    /*!*************************************!*\
  !*** ./src/side-bar/tab-control.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./tab-control.html */ "./src/side-bar/tab-control.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-control",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            params.model
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/side-bar/tabs.ts":
                    /*!******************************!*\
  !*** ./src/side-bar/tabs.ts ***!
  \******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./tabs.html */ "./src/side-bar/tabs.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tabs",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            params.model
                                        );
                                        return {
                                            model: params.model,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/simulator.ts":
                    /*!**************************!*\
  !*** ./src/simulator.ts ***!
  \**************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var templateHtml = __webpack_require__(
                            /*! ./simulator.html */ "./src/simulator.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "survey-simulator",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            params.model
                                        );
                                        return params.model;
                                    },
                                },
                                template: templateHtml.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/string-editor.ts":
                    /*!******************************!*\
  !*** ./src/string-editor.ts ***!
  \******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ StringEditorViewModel:
                                    () => /* binding */ StringEditorViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./string-editor.html */ "./src/string-editor.html"
                        );
                        function getEditorElement(element) {
                            return element.nextSibling.getElementsByClassName(
                                "sv-string-editor"
                            )[0];
                        }
                        var StringEditorViewModel = /** @class */ (function () {
                            function StringEditorViewModel(
                                locString,
                                creator,
                                element
                            ) {
                                var _this = this;
                                this.locString = locString;
                                this.creator = creator;
                                this.implementor = undefined;
                                this.afterRender = function () {
                                    _this.baseModel.afterRender();
                                };
                                this.errorText =
                                    knockout__WEBPACK_IMPORTED_MODULE_0__.observable(
                                        null
                                    );
                                this.baseModel =
                                    new survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.StringEditorViewModelBase(
                                        locString,
                                        creator
                                    );
                                this.baseModel.getEditorElement = function () {
                                    return getEditorElement(element);
                                };
                                this.implementor =
                                    new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                        this.baseModel
                                    );
                                this.focusEditor = function () {
                                    getEditorElement(element).focus();
                                };
                                this.baseModel.blurEditor = function () {
                                    var editorElement =
                                        getEditorElement(element);
                                    editorElement.blur();
                                    editorElement.spellcheck = false;
                                };
                                locString.strChanged();
                            }
                            StringEditorViewModel.prototype.setLocString =
                                function (locString) {
                                    this.baseModel.setLocString(locString);
                                    return locString;
                                };
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "koHasHtml",
                                {
                                    get: function () {
                                        return this.locString.koHasHtml();
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "koRenderedHtml",
                                {
                                    get: function () {
                                        return this.locString.koRenderedHtml();
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "className",
                                {
                                    get: function () {
                                        return this.baseModel.className(
                                            this.locString.koRenderedHtml()
                                        );
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "placeholder",
                                {
                                    get: function () {
                                        return this.baseModel.placeholder;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "contentEditable",
                                {
                                    get: function () {
                                        return this.baseModel.contentEditable
                                            ? "true"
                                            : "false";
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "characterCounter",
                                {
                                    get: function () {
                                        return this.baseModel.characterCounter;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "showCharacterCounter",
                                {
                                    get: function () {
                                        return this.baseModel
                                            .showCharacterCounter;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            Object.defineProperty(
                                StringEditorViewModel.prototype,
                                "getCharacterCounterClass",
                                {
                                    get: function () {
                                        return this.baseModel
                                            .getCharacterCounterClass;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            StringEditorViewModel.prototype.onClick = function (
                                sender,
                                event
                            ) {
                                this.baseModel.onClick(event);
                            };
                            StringEditorViewModel.prototype.onCompositionStart =
                                function (sender, event) {
                                    this.baseModel.onCompositionStart(event);
                                };
                            StringEditorViewModel.prototype.onCompositionEnd =
                                function (sender, event) {
                                    this.baseModel.onCompositionStart(event);
                                };
                            StringEditorViewModel.prototype.onInput = function (
                                sender,
                                event
                            ) {
                                this.baseModel.onInput(event);
                            };
                            StringEditorViewModel.prototype.onPaste = function (
                                sender,
                                event
                            ) {
                                this.baseModel.onPaste(event);
                            };
                            StringEditorViewModel.prototype.onBlur = function (
                                sender,
                                event
                            ) {
                                event.currentTarget.spellcheck = false;
                                this.baseModel.onBlur(event);
                                this.errorText(this.baseModel.errorText);
                                this.locString.searchElement = undefined;
                            };
                            StringEditorViewModel.prototype.onFocus = function (
                                sender,
                                event
                            ) {
                                this.baseModel.onFocus(event);
                            };
                            StringEditorViewModel.prototype.onKeyUp = function (
                                sender,
                                event
                            ) {
                                return this.baseModel.onKeyUp(event);
                            };
                            StringEditorViewModel.prototype.onKeyDown =
                                function (sender, event) {
                                    var res = this.baseModel.onKeyDown(event);
                                    this.errorText(this.baseModel.errorText);
                                    return res;
                                };
                            StringEditorViewModel.prototype.onMouseUp =
                                function (sender, event) {
                                    return this.baseModel.onMouseUp(event);
                                };
                            StringEditorViewModel.prototype.edit = function (
                                model,
                                _
                            ) {
                                setTimeout(function () {
                                    model.focusEditor && model.focusEditor();
                                }, 100);
                                this.baseModel.onClick(_);
                            };
                            StringEditorViewModel.prototype.done = function (
                                _,
                                event
                            ) {
                                this.baseModel.done(event);
                            };
                            StringEditorViewModel.prototype.dispose =
                                function () {
                                    this.locString.onSearchChanged = undefined;
                                    if (!!this.implementor) {
                                        this.implementor.dispose();
                                        this.implementor = undefined;
                                    }
                                    this.focusEditor = undefined;
                                    this.baseModel.blurEditor = undefined;
                                    this.baseModel.getEditorElement = undefined;
                                    this.baseModel.dispose();
                                };
                            return StringEditorViewModel;
                        })();

                        function getSearchElement(element) {
                            while (!!element && element.nodeName !== "SPAN") {
                                var elements =
                                    element.parentElement.getElementsByClassName(
                                        "sv-string-editor"
                                    );
                                element =
                                    elements.length > 0
                                        ? elements[0]
                                        : undefined;
                            }
                            if (!!element && element.childNodes.length > 0)
                                return element;
                            return null;
                        }
                        function resetLocalizationSpan(element, locStr) {
                            while (element.childNodes.length > 1) {
                                element.removeChild(element.childNodes[1]);
                            }
                            element.childNodes[0].textContent =
                                locStr.renderedHtml;
                        }
                        function applyLocStrOnSearchChanged(element, locStr) {
                            locStr.onSearchChanged = function () {
                                if (locStr.searchElement == undefined) {
                                    locStr.searchElement =
                                        getSearchElement(element);
                                }
                                if (locStr.searchElement == null) return;
                                var el = locStr.searchElement;
                                if (!locStr.highlightDiv) {
                                    locStr.highlightDiv =
                                        document.createElement("span");
                                    locStr.highlightDiv.style.backgroundColor =
                                        "lightgray";
                                }
                                if (locStr.searchIndex != undefined) {
                                    resetLocalizationSpan(el, locStr);
                                    var rng = document.createRange();
                                    rng.setStart(
                                        el.childNodes[0],
                                        locStr.searchIndex
                                    );
                                    rng.setEnd(
                                        el.childNodes[0],
                                        locStr.searchIndex +
                                            locStr.searchText.length
                                    );
                                    rng.surroundContents(locStr.highlightDiv);
                                } else {
                                    resetLocalizationSpan(el, locStr);
                                    locStr.searchElement = undefined;
                                }
                            };
                        }
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            survey_creator_core__WEBPACK_IMPORTED_MODULE_1__.editableStringRendererName,
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var data =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                params.locString
                                            );
                                        var model = new StringEditorViewModel(
                                            data.locStr,
                                            data.creator,
                                            componentInfo.element
                                        );
                                        var subscrib =
                                            knockout__WEBPACK_IMPORTED_MODULE_0__.computed(
                                                function () {
                                                    var locStr =
                                                        knockout__WEBPACK_IMPORTED_MODULE_0__.unwrap(
                                                            params.locString
                                                        ).locStr;
                                                    applyLocStrOnSearchChanged(
                                                        componentInfo.element,
                                                        locStr
                                                    );
                                                    model.setLocString(locStr);
                                                }
                                            );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                subscrib.dispose();
                                                model.dispose();
                                            }
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/survey-creator.ts":
                    /*!*******************************!*\
  !*** ./src/survey-creator.ts ***!
  \*******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ CreatorViewModel: () =>
                                    /* binding */ CreatorViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./survey-creator.html */ "./src/survey-creator.html"
                        );
                        // import template from "./creator.html";
                        var CreatorViewModel = /** @class */ (function () {
                            function CreatorViewModel(creator, rootNode) {
                                this.creator = creator;
                                this.rootNode = rootNode;
                                this.creator.setRootElement(this.rootNode);
                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                    this.creator.notifier
                                );
                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                    this.creator.toolbox
                                );
                                // new ImplementorBase(this.creator.dragDropSurveyElements);
                                // new ImplementorBase(this.creator.dragDropChoices);
                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                    this.creator
                                );
                            }
                            CreatorViewModel.prototype.dispose = function () {
                                this.creator.unsubscribeRootElement();
                            };
                            return CreatorViewModel;
                        })();

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "survey-creator",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var element = componentInfo.element;
                                        var model = new CreatorViewModel(
                                            params.creator,
                                            element
                                        );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            element,
                                            function () {
                                                model.dispose();
                                            }
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/survey-renderers/dropdown/index.ts":
                    /*!************************************************!*\
  !*** ./src/survey-renderers/dropdown/index.ts ***!
  \************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ DropdownEditorViewModel:
                                    () => /* binding */ DropdownEditorViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./dropdown.html */ "./src/survey-renderers/dropdown/dropdown.html"
                        );
                        var DropdownEditorViewModel =
                            /** @class */ (function () {
                                function DropdownEditorViewModel(question) {
                                    var _this = this;
                                    this.question = question;
                                    this.isExpanded =
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.observable(
                                            false
                                        );
                                    this.isFocused =
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.observable(
                                            false
                                        );
                                    this.selectItem = function (itemValue) {
                                        _this.question.value = itemValue.value;
                                        _this.isExpanded(false);
                                        _this.isFocused(true);
                                    };
                                }
                                DropdownEditorViewModel.prototype.toggle =
                                    function () {
                                        this.isExpanded(!this.isExpanded());
                                    };
                                DropdownEditorViewModel.prototype.onBlur =
                                    function () {
                                        this.isExpanded(false);
                                    };
                                return DropdownEditorViewModel;
                            })();

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "sjs-dropdown",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return new DropdownEditorViewModel(
                                            params.question
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_1__.RendererFactory.Instance.registerRenderer(
                            "dropdown",
                            "dropdown",
                            "sjs-dropdown"
                        );

                        /***/
                    },

                /***/ "./src/survey-renderers/question-error/question-error.ts":
                    /*!***************************************************************!*\
  !*** ./src/survey-renderers/question-error/question-error.ts ***!
  \***************************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ QuestionErrorComponent:
                                    () => /* binding */ QuestionErrorComponent,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./question-error.html */ "./src/survey-renderers/question-error/question-error.html"
                        )["default"];
                        var QuestionErrorComponent;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-question-error",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template,
                            }
                        );

                        /***/
                    },

                /***/ "./src/switcher/switcher.ts":
                    /*!**********************************!*\
  !*** ./src/switcher/switcher.ts ***!
  \**********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./switcher.html */ "./src/switcher/switcher.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-switcher",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var item = params.item;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            item
                                        );
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabbed-menu/tabbed-menu-item.ts":
                    /*!*********************************************!*\
  !*** ./src/tabbed-menu/tabbed-menu-item.ts ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./tabbed-menu-item.html */ "./src/tabbed-menu/tabbed-menu-item.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tabbed-menu-item",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params.item;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabbed-menu/tabbed-menu.ts":
                    /*!****************************************!*\
  !*** ./src/tabbed-menu/tabbed-menu.ts ***!
  \****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ TabbedMenuViewModel: () =>
                                    /* binding */ TabbedMenuViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_2__
                            );

                        var template = __webpack_require__(
                            /*! ./tabbed-menu.html */ "./src/tabbed-menu/tabbed-menu.html"
                        );
                        // import template from "./tabbed-menu.html";
                        var TabbedMenuViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tabbed-menu",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = params.model;
                                        var container =
                                            componentInfo.element
                                                .nextElementSibling;
                                        var reactivityImplementor =
                                            new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ActionContainerImplementor(
                                                model
                                            );
                                        var manager =
                                            new survey_core__WEBPACK_IMPORTED_MODULE_2__.ResponsivityManager(
                                                container,
                                                model,
                                                ".svc-tabbed-menu-item-container:not(.sv-dots)>.sv-action__content"
                                            );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            container,
                                            function () {
                                                manager.dispose();
                                                reactivityImplementor.dispose();
                                            }
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/designer.ts":
                    /*!******************************!*\
  !*** ./src/tabs/designer.ts ***!
  \******************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./designer.html */ "./src/tabs/designer.html"
                        );
                        // import template from "./designer.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-designer",
                            {
                                viewModel: {
                                    createViewModel: function (params) {
                                        var model = params.data.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model.pagesController
                                        );
                                        return { model: model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/json-editor-ace.ts":
                    /*!*************************************!*\
  !*** ./src/tabs/json-editor-ace.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./json-editor-ace.html */ "./src/tabs/json-editor-ace.html"
                        );
                        // import template from "./json-editor-ace.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-json-editor-ace",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var aceEditor = ace.edit(
                                            componentInfo.element.nextElementSibling.querySelector(
                                                ".svc-json-editor-tab__ace-editor"
                                            )
                                        );
                                        var plugin = params.data;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model
                                        );
                                        plugin.model.init(aceEditor);
                                        return { model: plugin.model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/json-editor-textarea.ts":
                    /*!******************************************!*\
  !*** ./src/tabs/json-editor-textarea.ts ***!
  \******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./json-editor-textarea.html */ "./src/tabs/json-editor-textarea.html"
                        );
                        // import template from "./json-editor-textarea.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-json-editor-textarea",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var plugin = params.data;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model
                                        );
                                        var model = plugin.model;
                                        model.canShowErrors = false;
                                        var el =
                                            componentInfo.element.parentElement;
                                        if (!!el) {
                                            var els = el.getElementsByClassName(
                                                "svc-json-editor-tab__content-area"
                                            );
                                            if (els.length > 0) {
                                                model.textElement = els[0];
                                            }
                                        }
                                        return { model: model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/json-error-item.ts":
                    /*!*************************************!*\
  !*** ./src/tabs/json-error-item.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ JsonErrorItemViewModel:
                                    () => /* binding */ JsonErrorItemViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./json-error-item.html */ "./src/tabs/json-error-item.html"
                        );
                        var JsonErrorItemViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "json-error-item",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return {
                                            item: params.item,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/logic-operator.ts":
                    /*!************************************!*\
  !*** ./src/tabs/logic-operator.ts ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ LogicOperatorViewModel:
                                    () => /* binding */ LogicOperatorViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./logic-operator.html */ "./src/tabs/logic-operator.html"
                        );
                        var LogicOperatorViewModel;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "sv-logic-operator",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var q = params.question;
                                        var click = function (_, e) {
                                            var _a;
                                            (_a = q.dropdownListModel) ===
                                                null || _a === void 0
                                                ? void 0
                                                : _a.onClick(e);
                                        };
                                        var clear = function (_, e) {
                                            var _a;
                                            (_a = q.dropdownListModel) ===
                                                null || _a === void 0
                                                ? void 0
                                                : _a.onClear(e);
                                        };
                                        var keyup = function (_, e) {
                                            var _a;
                                            (_a = q.dropdownListModel) ===
                                                null || _a === void 0
                                                ? void 0
                                                : _a.keyHandler(e);
                                        };
                                        if (!q.dropdownListModel) {
                                            q.dropdownListModel =
                                                new survey_core__WEBPACK_IMPORTED_MODULE_2__.DropdownListModel(
                                                    params.question
                                                );
                                        }
                                        (0,
                                        survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.initLogicOperator)(
                                            q
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            q.dropdownListModel
                                        );
                                        return {
                                            question: q,
                                            model: q.dropdownListModel,
                                            click: click,
                                            clear: clear,
                                            keyup: keyup,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );
                        survey_core__WEBPACK_IMPORTED_MODULE_2__.RendererFactory.Instance.registerRenderer(
                            "dropdown",
                            "logicoperator",
                            "sv-logic-operator"
                        );

                        /***/
                    },

                /***/ "./src/tabs/logic.ts":
                    /*!***************************!*\
  !*** ./src/tabs/logic.ts ***!
  \***************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var templateHtml = __webpack_require__(
                            /*! ./logic.html */ "./src/tabs/logic.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-logic",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var plugin = params.data;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model.addNewButton
                                        );
                                        return { model: plugin.model };
                                    },
                                },
                                template: templateHtml.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/test-complete.ts":
                    /*!***********************************!*\
  !*** ./src/tabs/test-complete.ts ***!
  \***********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./test-complete.html */ "./src/tabs/test-complete.html"
                        );
                        // import template from "./test-complete.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-complete-page",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model.testAgainAction
                                        );
                                        return {
                                            testAgainAction:
                                                model.testAgainAction,
                                        };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/test.ts":
                    /*!**************************!*\
  !*** ./src/tabs/test.ts ***!
  \**************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./test.html */ "./src/tabs/test.html"
                        );
                        // import template from "./test.html";
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-test",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var plugin = params.data;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model.simulator
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model
                                        );
                                        return { model: plugin.model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/theme.ts":
                    /*!***************************!*\
  !*** ./src/tabs/theme.ts ***!
  \***************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var template = __webpack_require__(
                            /*! ./theme.html */ "./src/tabs/theme.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-theme",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var plugin = params.data;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model.simulator
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model.testAgainAction
                                        );
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            plugin.model
                                        );
                                        return { model: plugin.model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/translation/translate-from-action.ts":
                    /*!*******************************************************!*\
  !*** ./src/tabs/translation/translate-from-action.ts ***!
  \*******************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./translate-from-action.html */ "./src/tabs/translation/translate-from-action.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-translate-from-action",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return params;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/translation/translation-line-skeleton.ts":
                    /*!***********************************************************!*\
  !*** ./src/tabs/translation/translation-line-skeleton.ts ***!
  \***********************************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ Skeleton: () =>
                                    /* binding */ Skeleton,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./translation-line-skeleton.html */ "./src/tabs/translation/translation-line-skeleton.html"
                        );
                        var Skeleton;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "sd-translation-line-skeleton",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return { question: params.question };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/tabs/translation/translation.ts":
                    /*!*********************************************!*\
  !*** ./src/tabs/translation/translation.ts ***!
  \*********************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__
                            );

                        var templateHtml = __webpack_require__(
                            /*! ./translation.html */ "./src/tabs/translation/translation.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-tab-translation",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var _a;
                                        var model =
                                            ((_a = params.data) === null ||
                                            _a === void 0
                                                ? void 0
                                                : _a.model) || params.model;
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                            model
                                        );
                                        model.makeObservable(function (obj) {
                                            new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_1__.ImplementorBase(
                                                obj
                                            );
                                        });
                                        return { model: model };
                                    },
                                },
                                template: templateHtml.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/adaptive-toolbox.ts":
                    /*!*****************************************!*\
  !*** ./src/toolbox/adaptive-toolbox.ts ***!
  \*****************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var _toolbox__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! ./toolbox */ "./src/toolbox/toolbox.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./adaptive-toolbox.html */ "./src/toolbox/adaptive-toolbox.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-adaptive-toolbox",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model =
                                            new _toolbox__WEBPACK_IMPORTED_MODULE_2__.ToolboxViewModel(
                                                params.model
                                            );
                                        var container = componentInfo.element;
                                        model.toolbox.setRootElement(container);
                                        var manager =
                                            new survey_core__WEBPACK_IMPORTED_MODULE_1__.VerticalResponsivityManager(
                                                model.toolbox.containerElement,
                                                params.model.toolbox,
                                                params.model.toolbox.itemSelector
                                            );
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.utils.domNodeDisposal.addDisposeCallback(
                                            componentInfo.element,
                                            function () {
                                                manager.dispose();
                                                model.dispose();
                                            }
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-item-group.ts":
                    /*!*******************************************!*\
  !*** ./src/toolbox/toolbox-item-group.ts ***!
  \*******************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );
                        /* harmony import */ var _toolbox_item__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(
                                /*! ./toolbox-item */ "./src/toolbox/toolbox-item.ts"
                            );

                        var template = __webpack_require__(
                            /*! ./toolbox-item-group.html */ "./src/toolbox/toolbox-item-group.html"
                        );
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-toolbox-item-group",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return new _toolbox_item__WEBPACK_IMPORTED_MODULE_1__.KnockoutToolboxItemViewModel(
                                            params.model,
                                            params.item,
                                            params.creator,
                                            params.isCompact
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-item.ts":
                    /*!*************************************!*\
  !*** ./src/toolbox/toolbox-item.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ KnockoutToolboxItemViewModel:
                                    () =>
                                        /* binding */ KnockoutToolboxItemViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./toolbox-item.html */ "./src/toolbox/toolbox-item.html"
                        );
                        var KnockoutToolboxItemViewModel =
                            /** @class */ (function () {
                                function KnockoutToolboxItemViewModel(
                                    model,
                                    item,
                                    creator,
                                    isCompact
                                ) {
                                    if (isCompact === void 0) {
                                        isCompact = false;
                                    }
                                    this.model = model;
                                    this.item = item;
                                    this.creator = creator;
                                    this.isCompact = isCompact;
                                    this.title =
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.observable(
                                            ""
                                        );
                                    this.iconName =
                                        knockout__WEBPACK_IMPORTED_MODULE_0__.observable(
                                            ""
                                        );
                                    this.iconName(item.iconName);
                                    this.title(item.title);
                                }
                                return KnockoutToolboxItemViewModel;
                            })();

                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-toolbox-item",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        return new KnockoutToolboxItemViewModel(
                                            params.model,
                                            params.item,
                                            params.creator,
                                            params.isCompact
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-list.ts":
                    /*!*************************************!*\
  !*** ./src/toolbox/toolbox-list.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ ToolboxListViewComponent:
                                    () =>
                                        /* binding */ ToolboxListViewComponent,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var template = __webpack_require__(
                            /*! ./toolbox-list.html */ "./src/toolbox/toolbox-list.html"
                        );
                        var ToolboxListViewComponent;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "svc-toolbox-list",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = params.model;
                                        return { model: model };
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/toolbox-tool.ts":
                    /*!*************************************!*\
  !*** ./src/toolbox/toolbox-tool.ts ***!
  \*************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ KnockoutToolboxToolViewModel:
                                    () =>
                                        /* binding */ KnockoutToolboxToolViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-creator-core */ "survey-creator-core"
                            );
                        /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./toolbox-tool.html */ "./src/toolbox/toolbox-tool.html"
                        );
                        var KnockoutToolboxToolViewModel =
                            /** @class */ (function (_super) {
                                (0,
                                tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                    KnockoutToolboxToolViewModel,
                                    _super
                                );
                                function KnockoutToolboxToolViewModel(
                                    item,
                                    creator,
                                    model,
                                    isCompact
                                ) {
                                    if (isCompact === void 0) {
                                        isCompact = false;
                                    }
                                    var _this =
                                        _super.call(
                                            this,
                                            item,
                                            creator,
                                            model
                                        ) || this;
                                    _this.item = item;
                                    _this.creator = creator;
                                    _this.isCompact = isCompact;
                                    _this.title =
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.observable(
                                            ""
                                        );
                                    _this.iconName =
                                        knockout__WEBPACK_IMPORTED_MODULE_1__.observable(
                                            ""
                                        );
                                    return _this;
                                }
                                return KnockoutToolboxToolViewModel;
                            })(
                                survey_creator_core__WEBPACK_IMPORTED_MODULE_3__.ToolboxToolViewModel
                            );

                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-toolbox-tool",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                            params.item
                                        );
                                        return new KnockoutToolboxToolViewModel(
                                            params.item,
                                            params.creator,
                                            params.model,
                                            params.isCompact
                                        );
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/toolbox/toolbox.ts":
                    /*!********************************!*\
  !*** ./src/toolbox/toolbox.ts ***!
  \********************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ ToolboxViewModel: () =>
                                    /* binding */ ToolboxViewModel,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(
                                /*! tslib */ "./src/entries/helpers.ts"
                            );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_1___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_1__
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__ =
                            __webpack_require__(
                                /*! survey-knockout-ui */ "survey-knockout-ui"
                            );
                        /* harmony import */ var survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_3__ =
                            __webpack_require__(
                                /*! survey-core */ "survey-core"
                            );
                        /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_3___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                survey_core__WEBPACK_IMPORTED_MODULE_3__
                            );

                        var template = __webpack_require__(
                            /*! ./toolbox.html */ "./src/toolbox/toolbox.html"
                        );
                        var ToolboxViewModel = /** @class */ (function (
                            _super
                        ) {
                            (0, tslib__WEBPACK_IMPORTED_MODULE_0__.__extends)(
                                ToolboxViewModel,
                                _super
                            );
                            // private _isCompact = ko.observable(true);
                            // private _isCompactSubscription: ko.Computed;
                            // public get isCompact() {
                            //   return this._isCompact();
                            // }
                            // public set isCompact(val: boolean) {
                            //   this._isCompact(val);
                            // }
                            function ToolboxViewModel(creator) {
                                var _this = _super.call(this) || this;
                                _this.categories =
                                    knockout__WEBPACK_IMPORTED_MODULE_1__.observableArray();
                                _this.creator = creator;
                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                    _this.toolbox
                                );
                                _this._categoriesSubscription =
                                    knockout__WEBPACK_IMPORTED_MODULE_1__.computed(
                                        function () {
                                            var categories =
                                                knockout__WEBPACK_IMPORTED_MODULE_1__.unwrap(
                                                    _this.toolbox.categories
                                                );
                                            categories.forEach(function (
                                                category,
                                                categoryIndex
                                            ) {
                                                new survey_knockout_ui__WEBPACK_IMPORTED_MODULE_2__.ImplementorBase(
                                                    category
                                                );
                                            });
                                            // this._isCompactSubscription = ko.computed(() => this.isCompact = ko.unwrap(this.toolbox.isCompact));
                                            _this.categories(categories);
                                        }
                                    );
                                return _this;
                            }
                            Object.defineProperty(
                                ToolboxViewModel.prototype,
                                "toolbox",
                                {
                                    get: function () {
                                        return this.creator.toolbox;
                                    },
                                    enumerable: false,
                                    configurable: true,
                                }
                            );
                            ToolboxViewModel.prototype.dispose = function () {
                                this._categoriesSubscription.dispose();
                                this.toolbox.setRootElement(null);
                                // this._isCompactSubscription.dispose();
                            };
                            return ToolboxViewModel;
                        })(survey_core__WEBPACK_IMPORTED_MODULE_3__.Base);

                        knockout__WEBPACK_IMPORTED_MODULE_1__.components.register(
                            "svc-toolbox",
                            {
                                viewModel: {
                                    createViewModel: function (
                                        params,
                                        componentInfo
                                    ) {
                                        var model = new ToolboxViewModel(
                                            params.model
                                        );
                                        return model;
                                    },
                                },
                                template: template.default,
                            }
                        );

                        /***/
                    },

                /***/ "./src/utils/survey-widget.ts":
                    /*!************************************!*\
  !*** ./src/utils/survey-widget.ts ***!
  \************************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony export */ __webpack_require__.d(
                            __webpack_exports__,
                            {
                                /* harmony export */ SurveyWidgetBinding: () =>
                                    /* binding */ SurveyWidgetBinding,
                                /* harmony export */
                            }
                        );
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        var SurveyWidgetBinding;
                        knockout__WEBPACK_IMPORTED_MODULE_0__.components.register(
                            "survey-widget",
                            {
                                viewModel: function (params) {
                                    this.survey = params.model;
                                },
                                template:
                                    "<!-- ko if: $data.survey --><!-- ko template: { name: 'survey-content', data: survey, afterRender: $parent.koEventAfterRender } --><!-- /ko --><!-- /ko -->",
                            }
                        );

                        /***/
                    },

                /***/ "./src/utils/utils.ts":
                    /*!****************************!*\
  !*** ./src/utils/utils.ts ***!
  \****************************/
                    /***/ (
                        __unused_webpack_module,
                        __webpack_exports__,
                        __webpack_require__
                    ) => {
                        __webpack_require__.r(__webpack_exports__);
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0__ =
                            __webpack_require__(/*! knockout */ "knockout");
                        /* harmony import */ var knockout__WEBPACK_IMPORTED_MODULE_0___default =
                            /*#__PURE__*/ __webpack_require__.n(
                                knockout__WEBPACK_IMPORTED_MODULE_0__
                            );

                        knockout__WEBPACK_IMPORTED_MODULE_0__.bindingHandlers[
                            "trueclick"
                        ] = {
                            init: function (
                                element,
                                valueAccessor,
                                allBindingsAccessor
                            ) {
                                element.onclick = function () {
                                    return true;
                                };
                            },
                        };
                        knockout__WEBPACK_IMPORTED_MODULE_0__.bindingHandlers[
                            "clickNoFocus"
                        ] = {
                            init: function (
                                element,
                                valueAccessor,
                                allBindingsAccessor,
                                viewModel
                            ) {
                                element.onclick = function (ev) {
                                    valueAccessor().call(
                                        viewModel,
                                        viewModel,
                                        ev
                                    );
                                };
                            },
                        };
                        knockout__WEBPACK_IMPORTED_MODULE_0__.bindingHandlers[
                            "afterRenderParent"
                        ] = {
                            init: function (
                                element,
                                valueAccessor,
                                allBindingsAccessor,
                                viewModel
                            ) {
                                element.style.display = "none";
                                valueAccessor() &&
                                    valueAccessor()([element.parentElement]);
                            },
                        };

                        /***/
                    },

                /***/ "survey-core":
                    /*!*********************************************************************************************************!*\
  !*** external {"root":"Survey","commonjs2":"survey-core","commonjs":"survey-core","amd":"survey-core"} ***!
  \*********************************************************************************************************/
                    /***/ (module) => {
                        module.exports =
                            __WEBPACK_EXTERNAL_MODULE_survey_core__;

                        /***/
                    },

                /***/ "survey-creator-core":
                    /*!********************************************************************************************************************************************!*\
  !*** external {"root":"SurveyCreatorCore","commonjs2":"survey-creator-core","commonjs":"survey-creator-core","amd":"survey-creator-core"} ***!
  \********************************************************************************************************************************************/
                    /***/ (module) => {
                        module.exports =
                            __WEBPACK_EXTERNAL_MODULE_survey_creator_core__;

                        /***/
                    },

                /***/ "survey-knockout-ui":
                    /*!**************************************************************************************************************************************!*\
  !*** external {"root":"SurveyKnockout","commonjs2":"survey-knockout-ui","commonjs":"survey-knockout-ui","amd":"survey-knockout-ui"} ***!
  \**************************************************************************************************************************************/
                    /***/ (module) => {
                        module.exports =
                            __WEBPACK_EXTERNAL_MODULE_survey_knockout_ui__;

                        /***/
                    },

                /***/ knockout:
                    /*!********************************************************************************************!*\
  !*** external {"root":"ko","commonjs2":"knockout","commonjs":"knockout","amd":"knockout"} ***!
  \********************************************************************************************/
                    /***/ (module) => {
                        module.exports = __WEBPACK_EXTERNAL_MODULE_knockout__;

                        /***/
                    },

                /******/
            };
            /************************************************************************/
            /******/ // The module cache
            /******/ var __webpack_module_cache__ = {};
            /******/
            /******/ // The require function
            /******/ function __webpack_require__(moduleId) {
                /******/ // Check if module is in cache
                /******/ var cachedModule = __webpack_module_cache__[moduleId];
                /******/ if (cachedModule !== undefined) {
                    /******/ return cachedModule.exports;
                    /******/
                }
                /******/ // Create a new module (and put it into the cache)
                /******/ var module = (__webpack_module_cache__[moduleId] = {
                    /******/ // no module.id needed
                    /******/ // no module.loaded needed
                    /******/ exports: {},
                    /******/
                });
                /******/
                /******/ // Execute the module function
                /******/ __webpack_modules__[moduleId](
                    module,
                    module.exports,
                    __webpack_require__
                );
                /******/
                /******/ // Return the exports of the module
                /******/ return module.exports;
                /******/
            }
            /******/
            /************************************************************************/
            /******/ /* webpack/runtime/compat get default export */
            /******/ (() => {
                /******/ // getDefaultExport function for compatibility with non-harmony modules
                /******/ __webpack_require__.n = (module) => {
                    /******/ var getter =
                        module && module.__esModule
                            ? /******/ () => module["default"]
                            : /******/ () => module;
                    /******/ __webpack_require__.d(getter, { a: getter });
                    /******/ return getter;
                    /******/
                };
                /******/
            })();
            /******/
            /******/ /* webpack/runtime/define property getters */
            /******/ (() => {
                /******/ // define getter functions for harmony exports
                /******/ __webpack_require__.d = (exports, definition) => {
                    /******/ for (var key in definition) {
                        /******/ if (
                            __webpack_require__.o(definition, key) &&
                            !__webpack_require__.o(exports, key)
                        ) {
                            /******/ Object.defineProperty(exports, key, {
                                enumerable: true,
                                get: definition[key],
                            });
                            /******/
                        }
                        /******/
                    }
                    /******/
                };
                /******/
            })();
            /******/
            /******/ /* webpack/runtime/hasOwnProperty shorthand */
            /******/ (() => {
                /******/ __webpack_require__.o = (obj, prop) =>
                    Object.prototype.hasOwnProperty.call(obj, prop);
                /******/
            })();
            /******/
            /******/ /* webpack/runtime/make namespace object */
            /******/ (() => {
                /******/ // define __esModule on exports
                /******/ __webpack_require__.r = (exports) => {
                    /******/ if (
                        typeof Symbol !== "undefined" &&
                        Symbol.toStringTag
                    ) {
                        /******/ Object.defineProperty(
                            exports,
                            Symbol.toStringTag,
                            { value: "Module" }
                        );
                        /******/
                    }
                    /******/ Object.defineProperty(exports, "__esModule", {
                        value: true,
                    });
                    /******/
                };
                /******/
            })();
            /******/
            /************************************************************************/
            var __webpack_exports__ = {};
            /*!******************************!*\
  !*** ./src/entries/index.ts ***!
  \******************************/
            __webpack_require__.r(__webpack_exports__);
            /* harmony export */ __webpack_require__.d(__webpack_exports__, {
                /* harmony export */ ActionButtonViewModel: () =>
                    /* reexport safe */ _action_button__WEBPACK_IMPORTED_MODULE_26__.ActionButtonViewModel,
                /* harmony export */ AddNewQuestionTypeSelectorViewModel: () =>
                    /* reexport safe */ _add_question__WEBPACK_IMPORTED_MODULE_8__.AddNewQuestionTypeSelectorViewModel,
                /* harmony export */ AddNewQuestionViewModel: () =>
                    /* reexport safe */ _add_question__WEBPACK_IMPORTED_MODULE_8__.AddNewQuestionViewModel,
                /* harmony export */ ColorItemViewModel: () =>
                    /* reexport safe */ _custom_questions_color_item__WEBPACK_IMPORTED_MODULE_29__.ColorItemViewModel,
                /* harmony export */ CreatorSurveyPageComponent: () =>
                    /* reexport safe */ _page__WEBPACK_IMPORTED_MODULE_7__.CreatorSurveyPageComponent,
                /* harmony export */ CreatorViewModel: () =>
                    /* reexport safe */ _survey_creator__WEBPACK_IMPORTED_MODULE_0__.CreatorViewModel,
                /* harmony export */ DropdownEditorViewModel: () =>
                    /* reexport safe */ _survey_renderers_dropdown__WEBPACK_IMPORTED_MODULE_51__.DropdownEditorViewModel,
                /* harmony export */ JsonErrorItemViewModel: () =>
                    /* reexport safe */ _tabs_json_error_item__WEBPACK_IMPORTED_MODULE_27__.JsonErrorItemViewModel,
                /* harmony export */ KnockoutToolboxItemViewModel: () =>
                    /* reexport safe */ _toolbox_toolbox_item__WEBPACK_IMPORTED_MODULE_60__.KnockoutToolboxItemViewModel,
                /* harmony export */ KnockoutToolboxToolViewModel: () =>
                    /* reexport safe */ _toolbox_toolbox_tool__WEBPACK_IMPORTED_MODULE_62__.KnockoutToolboxToolViewModel,
                /* harmony export */ LogicOperatorViewModel: () =>
                    /* reexport safe */ _tabs_logic_operator__WEBPACK_IMPORTED_MODULE_5__.LogicOperatorViewModel,
                /* harmony export */ PageNavigatorItemViewModel: () =>
                    /* reexport safe */ _page_navigator_page_navigator_item__WEBPACK_IMPORTED_MODULE_36__.PageNavigatorItemViewModel,
                /* harmony export */ PageNavigatorView: () =>
                    /* reexport safe */ _page_navigator_page_navigator__WEBPACK_IMPORTED_MODULE_35__.PageNavigatorView,
                /* harmony export */ PropertyGridEditorCollection: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.PropertyGridEditorCollection,
                /* harmony export */ QuestionColor: () =>
                    /* reexport safe */ _custom_questions_question_color__WEBPACK_IMPORTED_MODULE_30__.QuestionColor,
                /* harmony export */ QuestionColorImplementor: () =>
                    /* reexport safe */ _custom_questions_question_color__WEBPACK_IMPORTED_MODULE_30__.QuestionColorImplementor,
                /* harmony export */ QuestionCommentWithReset: () =>
                    /* reexport safe */ _custom_questions_text_with_reset__WEBPACK_IMPORTED_MODULE_33__.QuestionCommentWithReset,
                /* harmony export */ QuestionEmbeddedSurvey: () =>
                    /* reexport safe */ _question_embedded_survey__WEBPACK_IMPORTED_MODULE_16__.QuestionEmbeddedSurvey,
                /* harmony export */ QuestionErrorComponent: () =>
                    /* reexport safe */ _survey_renderers_question_error_question_error__WEBPACK_IMPORTED_MODULE_52__.QuestionErrorComponent,
                /* harmony export */ QuestionFileEditor: () =>
                    /* reexport safe */ _custom_questions_question_file__WEBPACK_IMPORTED_MODULE_32__.QuestionFileEditor,
                /* harmony export */ QuestionLinkValue: () =>
                    /* reexport safe */ _question_link_value__WEBPACK_IMPORTED_MODULE_15__.QuestionLinkValue,
                /* harmony export */ QuestionSpinEditor: () =>
                    /* reexport safe */ _custom_questions_spin_editor__WEBPACK_IMPORTED_MODULE_31__.QuestionSpinEditor,
                /* harmony export */ QuestionSpinEditorImplementor: () =>
                    /* reexport safe */ _custom_questions_spin_editor__WEBPACK_IMPORTED_MODULE_31__.QuestionSpinEditorImplementor,
                /* harmony export */ QuestionTextWithReset: () =>
                    /* reexport safe */ _custom_questions_text_with_reset__WEBPACK_IMPORTED_MODULE_33__.QuestionTextWithReset,
                /* harmony export */ QuestionTextWithResetImplementor: () =>
                    /* reexport safe */ _custom_questions_text_with_reset__WEBPACK_IMPORTED_MODULE_33__.QuestionTextWithResetImplementor,
                /* harmony export */ Skeleton: () =>
                    /* reexport safe */ _tabs_translation_translation_line_skeleton__WEBPACK_IMPORTED_MODULE_65__.Skeleton,
                /* harmony export */ StringEditorViewModel: () =>
                    /* reexport safe */ _string_editor__WEBPACK_IMPORTED_MODULE_10__.StringEditorViewModel,
                /* harmony export */ StylesManager: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.StylesManager,
                /* harmony export */ SurfacePlaceholderViewModel: () =>
                    /* reexport safe */ _components_surface_placeholder__WEBPACK_IMPORTED_MODULE_28__.SurfacePlaceholderViewModel,
                /* harmony export */ SurveyCreator: () =>
                    /* reexport safe */ _creator__WEBPACK_IMPORTED_MODULE_70__.SurveyCreator,
                /* harmony export */ SurveyLogic: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.SurveyLogic,
                /* harmony export */ SurveyLogicUI: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.SurveyLogicUI,
                /* harmony export */ SurveyQuestionEditorDefinition: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.SurveyQuestionEditorDefinition,
                /* harmony export */ SurveyWidgetBinding: () =>
                    /* reexport safe */ _utils_survey_widget__WEBPACK_IMPORTED_MODULE_67__.SurveyWidgetBinding,
                /* harmony export */ SwitchViewModel: () =>
                    /* reexport safe */ _custom_questions_boolean_switch__WEBPACK_IMPORTED_MODULE_34__.SwitchViewModel,
                /* harmony export */ TabbedMenuViewModel: () =>
                    /* reexport safe */ _tabbed_menu_tabbed_menu__WEBPACK_IMPORTED_MODULE_56__.TabbedMenuViewModel,
                /* harmony export */ ToolboxListViewComponent: () =>
                    /* reexport safe */ _toolbox_toolbox_list__WEBPACK_IMPORTED_MODULE_63__.ToolboxListViewComponent,
                /* harmony export */ ToolboxToolViewModel: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.ToolboxToolViewModel,
                /* harmony export */ ToolboxViewModel: () =>
                    /* reexport safe */ _toolbox_toolbox__WEBPACK_IMPORTED_MODULE_58__.ToolboxViewModel,
                /* harmony export */ Version: () => /* binding */ Version,
                /* harmony export */ createPanelViewModel: () =>
                    /* reexport safe */ _adorners_panel__WEBPACK_IMPORTED_MODULE_12__.createPanelViewModel,
                /* harmony export */ createQuestionViewModel: () =>
                    /* reexport safe */ _adorners_question__WEBPACK_IMPORTED_MODULE_11__.createQuestionViewModel,
                /* harmony export */ editorLocalization: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.editorLocalization,
                /* harmony export */ localization: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.localization,
                /* harmony export */ settings: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.settings,
                /* harmony export */ svgBundle: () =>
                    /* reexport safe */ survey_creator_core__WEBPACK_IMPORTED_MODULE_71__.svgBundle,
                /* harmony export */
            });
            /* harmony import */ var _survey_creator__WEBPACK_IMPORTED_MODULE_0__ =
                __webpack_require__(
                    /*! ../survey-creator */ "./src/survey-creator.ts"
                );
            /* harmony import */ var _tabs_designer__WEBPACK_IMPORTED_MODULE_1__ =
                __webpack_require__(
                    /*! ../tabs/designer */ "./src/tabs/designer.ts"
                );
            /* harmony import */ var _tabs_json_editor_ace__WEBPACK_IMPORTED_MODULE_2__ =
                __webpack_require__(
                    /*! ../tabs/json-editor-ace */ "./src/tabs/json-editor-ace.ts"
                );
            /* harmony import */ var _tabs_json_editor_textarea__WEBPACK_IMPORTED_MODULE_3__ =
                __webpack_require__(
                    /*! ../tabs/json-editor-textarea */ "./src/tabs/json-editor-textarea.ts"
                );
            /* harmony import */ var _tabs_logic__WEBPACK_IMPORTED_MODULE_4__ =
                __webpack_require__(/*! ../tabs/logic */ "./src/tabs/logic.ts");
            /* harmony import */ var _tabs_logic_operator__WEBPACK_IMPORTED_MODULE_5__ =
                __webpack_require__(
                    /*! ../tabs/logic-operator */ "./src/tabs/logic-operator.ts"
                );
            /* harmony import */ var _tabs_translation_translation__WEBPACK_IMPORTED_MODULE_6__ =
                __webpack_require__(
                    /*! ../tabs/translation/translation */ "./src/tabs/translation/translation.ts"
                );
            /* harmony import */ var _page__WEBPACK_IMPORTED_MODULE_7__ =
                __webpack_require__(/*! ../page */ "./src/page.ts");
            /* harmony import */ var _add_question__WEBPACK_IMPORTED_MODULE_8__ =
                __webpack_require__(
                    /*! ../add-question */ "./src/add-question.ts"
                );
            /* harmony import */ var _row__WEBPACK_IMPORTED_MODULE_9__ =
                __webpack_require__(/*! ../row */ "./src/row.ts");
            /* harmony import */ var _string_editor__WEBPACK_IMPORTED_MODULE_10__ =
                __webpack_require__(
                    /*! ../string-editor */ "./src/string-editor.ts"
                );
            /* harmony import */ var _adorners_question__WEBPACK_IMPORTED_MODULE_11__ =
                __webpack_require__(
                    /*! ../adorners/question */ "./src/adorners/question.ts"
                );
            /* harmony import */ var _adorners_panel__WEBPACK_IMPORTED_MODULE_12__ =
                __webpack_require__(
                    /*! ../adorners/panel */ "./src/adorners/panel.ts"
                );
            /* harmony import */ var _adorners_question_dropdown__WEBPACK_IMPORTED_MODULE_13__ =
                __webpack_require__(
                    /*! ../adorners/question-dropdown */ "./src/adorners/question-dropdown.ts"
                );
            /* harmony import */ var _adorners_question_banner__WEBPACK_IMPORTED_MODULE_14__ =
                __webpack_require__(
                    /*! ../adorners/question-banner */ "./src/adorners/question-banner.ts"
                );
            /* harmony import */ var _question_link_value__WEBPACK_IMPORTED_MODULE_15__ =
                __webpack_require__(
                    /*! ../question-link-value */ "./src/question-link-value.ts"
                );
            /* harmony import */ var _question_embedded_survey__WEBPACK_IMPORTED_MODULE_16__ =
                __webpack_require__(
                    /*! ../question-embedded-survey */ "./src/question-embedded-survey.ts"
                );
            /* harmony import */ var _adorners_question_image__WEBPACK_IMPORTED_MODULE_17__ =
                __webpack_require__(
                    /*! ../adorners/question-image */ "./src/adorners/question-image.ts"
                );
            /* harmony import */ var _adorners_question_rating__WEBPACK_IMPORTED_MODULE_18__ =
                __webpack_require__(
                    /*! ../adorners/question-rating */ "./src/adorners/question-rating.ts"
                );
            /* harmony import */ var _question_widget__WEBPACK_IMPORTED_MODULE_19__ =
                __webpack_require__(
                    /*! ../question-widget */ "./src/question-widget.ts"
                );
            /* harmony import */ var _adorners_item_value__WEBPACK_IMPORTED_MODULE_20__ =
                __webpack_require__(
                    /*! ../adorners/item-value */ "./src/adorners/item-value.ts"
                );
            /* harmony import */ var _adorners_image_item_value__WEBPACK_IMPORTED_MODULE_21__ =
                __webpack_require__(
                    /*! ../adorners/image-item-value */ "./src/adorners/image-item-value.ts"
                );
            /* harmony import */ var _adorners_matrix_cell__WEBPACK_IMPORTED_MODULE_22__ =
                __webpack_require__(
                    /*! ../adorners/matrix-cell */ "./src/adorners/matrix-cell.ts"
                );
            /* harmony import */ var _question_editor_content__WEBPACK_IMPORTED_MODULE_23__ =
                __webpack_require__(
                    /*! ../question-editor-content */ "./src/question-editor-content.ts"
                );
            /* harmony import */ var _adorners_cell_question__WEBPACK_IMPORTED_MODULE_24__ =
                __webpack_require__(
                    /*! ../adorners/cell-question */ "./src/adorners/cell-question.ts"
                );
            /* harmony import */ var _adorners_cell_question_dropdown__WEBPACK_IMPORTED_MODULE_25__ =
                __webpack_require__(
                    /*! ../adorners/cell-question-dropdown */ "./src/adorners/cell-question-dropdown.ts"
                );
            /* harmony import */ var _action_button__WEBPACK_IMPORTED_MODULE_26__ =
                __webpack_require__(
                    /*! ../action-button */ "./src/action-button.ts"
                );
            /* harmony import */ var _tabs_json_error_item__WEBPACK_IMPORTED_MODULE_27__ =
                __webpack_require__(
                    /*! ../tabs/json-error-item */ "./src/tabs/json-error-item.ts"
                );
            /* harmony import */ var _components_surface_placeholder__WEBPACK_IMPORTED_MODULE_28__ =
                __webpack_require__(
                    /*! ../components/surface-placeholder */ "./src/components/surface-placeholder.ts"
                );
            /* harmony import */ var _custom_questions_color_item__WEBPACK_IMPORTED_MODULE_29__ =
                __webpack_require__(
                    /*! ../custom-questions/color-item */ "./src/custom-questions/color-item.ts"
                );
            /* harmony import */ var _custom_questions_question_color__WEBPACK_IMPORTED_MODULE_30__ =
                __webpack_require__(
                    /*! ../custom-questions/question-color */ "./src/custom-questions/question-color.ts"
                );
            /* harmony import */ var _custom_questions_spin_editor__WEBPACK_IMPORTED_MODULE_31__ =
                __webpack_require__(
                    /*! ../custom-questions/spin-editor */ "./src/custom-questions/spin-editor.ts"
                );
            /* harmony import */ var _custom_questions_question_file__WEBPACK_IMPORTED_MODULE_32__ =
                __webpack_require__(
                    /*! ../custom-questions/question-file */ "./src/custom-questions/question-file.ts"
                );
            /* harmony import */ var _custom_questions_text_with_reset__WEBPACK_IMPORTED_MODULE_33__ =
                __webpack_require__(
                    /*! ../custom-questions/text-with-reset */ "./src/custom-questions/text-with-reset.ts"
                );
            /* harmony import */ var _custom_questions_boolean_switch__WEBPACK_IMPORTED_MODULE_34__ =
                __webpack_require__(
                    /*! ../custom-questions/boolean-switch */ "./src/custom-questions/boolean-switch.ts"
                );
            /* harmony import */ var _page_navigator_page_navigator__WEBPACK_IMPORTED_MODULE_35__ =
                __webpack_require__(
                    /*! ../page-navigator/page-navigator */ "./src/page-navigator/page-navigator.ts"
                );
            /* harmony import */ var _page_navigator_page_navigator_item__WEBPACK_IMPORTED_MODULE_36__ =
                __webpack_require__(
                    /*! ../page-navigator/page-navigator-item */ "./src/page-navigator/page-navigator-item.ts"
                );
            /* harmony import */ var _side_bar_object_selector__WEBPACK_IMPORTED_MODULE_37__ =
                __webpack_require__(
                    /*! ../side-bar/object-selector */ "./src/side-bar/object-selector.ts"
                );
            /* harmony import */ var _side_bar_search__WEBPACK_IMPORTED_MODULE_38__ =
                __webpack_require__(
                    /*! ../side-bar/search */ "./src/side-bar/search.ts"
                );
            /* harmony import */ var _side_bar_property_grid__WEBPACK_IMPORTED_MODULE_39__ =
                __webpack_require__(
                    /*! ../side-bar/property-grid */ "./src/side-bar/property-grid.ts"
                );
            /* harmony import */ var _side_bar_side_bar__WEBPACK_IMPORTED_MODULE_40__ =
                __webpack_require__(
                    /*! ../side-bar/side-bar */ "./src/side-bar/side-bar.ts"
                );
            /* harmony import */ var _side_bar_side_bar_default_header__WEBPACK_IMPORTED_MODULE_41__ =
                __webpack_require__(
                    /*! ../side-bar/side-bar-default-header */ "./src/side-bar/side-bar-default-header.ts"
                );
            /* harmony import */ var _side_bar_side_bar_page__WEBPACK_IMPORTED_MODULE_42__ =
                __webpack_require__(
                    /*! ../side-bar/side-bar-page */ "./src/side-bar/side-bar-page.ts"
                );
            /* harmony import */ var _side_bar_property_grid_placeholder__WEBPACK_IMPORTED_MODULE_43__ =
                __webpack_require__(
                    /*! ../side-bar/property-grid-placeholder */ "./src/side-bar/property-grid-placeholder.ts"
                );
            /* harmony import */ var _side_bar_side_bar_header__WEBPACK_IMPORTED_MODULE_44__ =
                __webpack_require__(
                    /*! ../side-bar/side-bar-header */ "./src/side-bar/side-bar-header.ts"
                );
            /* harmony import */ var _side_bar_side_bar_property_grid_header__WEBPACK_IMPORTED_MODULE_45__ =
                __webpack_require__(
                    /*! ../side-bar/side-bar-property-grid-header */ "./src/side-bar/side-bar-property-grid-header.ts"
                );
            /* harmony import */ var _side_bar_tab_button__WEBPACK_IMPORTED_MODULE_46__ =
                __webpack_require__(
                    /*! ../side-bar/tab-button */ "./src/side-bar/tab-button.ts"
                );
            /* harmony import */ var _side_bar_tab_control__WEBPACK_IMPORTED_MODULE_47__ =
                __webpack_require__(
                    /*! ../side-bar/tab-control */ "./src/side-bar/tab-control.ts"
                );
            /* harmony import */ var _side_bar_tabs__WEBPACK_IMPORTED_MODULE_48__ =
                __webpack_require__(
                    /*! ../side-bar/tabs */ "./src/side-bar/tabs.ts"
                );
            /* harmony import */ var _results__WEBPACK_IMPORTED_MODULE_49__ =
                __webpack_require__(/*! ../results */ "./src/results.ts");
            /* harmony import */ var _simulator__WEBPACK_IMPORTED_MODULE_50__ =
                __webpack_require__(/*! ../simulator */ "./src/simulator.ts");
            /* harmony import */ var _survey_renderers_dropdown__WEBPACK_IMPORTED_MODULE_51__ =
                __webpack_require__(
                    /*! ../survey-renderers/dropdown */ "./src/survey-renderers/dropdown/index.ts"
                );
            /* harmony import */ var _survey_renderers_question_error_question_error__WEBPACK_IMPORTED_MODULE_52__ =
                __webpack_require__(
                    /*! ../survey-renderers/question-error/question-error */ "./src/survey-renderers/question-error/question-error.ts"
                );
            /* harmony import */ var _tabs_test__WEBPACK_IMPORTED_MODULE_53__ =
                __webpack_require__(/*! ../tabs/test */ "./src/tabs/test.ts");
            /* harmony import */ var _tabs_test_complete__WEBPACK_IMPORTED_MODULE_54__ =
                __webpack_require__(
                    /*! ../tabs/test-complete */ "./src/tabs/test-complete.ts"
                );
            /* harmony import */ var _tabs_theme__WEBPACK_IMPORTED_MODULE_55__ =
                __webpack_require__(/*! ../tabs/theme */ "./src/tabs/theme.ts");
            /* harmony import */ var _tabbed_menu_tabbed_menu__WEBPACK_IMPORTED_MODULE_56__ =
                __webpack_require__(
                    /*! ../tabbed-menu/tabbed-menu */ "./src/tabbed-menu/tabbed-menu.ts"
                );
            /* harmony import */ var _tabbed_menu_tabbed_menu_item__WEBPACK_IMPORTED_MODULE_57__ =
                __webpack_require__(
                    /*! ../tabbed-menu/tabbed-menu-item */ "./src/tabbed-menu/tabbed-menu-item.ts"
                );
            /* harmony import */ var _toolbox_toolbox__WEBPACK_IMPORTED_MODULE_58__ =
                __webpack_require__(
                    /*! ../toolbox/toolbox */ "./src/toolbox/toolbox.ts"
                );
            /* harmony import */ var _toolbox_adaptive_toolbox__WEBPACK_IMPORTED_MODULE_59__ =
                __webpack_require__(
                    /*! ../toolbox/adaptive-toolbox */ "./src/toolbox/adaptive-toolbox.ts"
                );
            /* harmony import */ var _toolbox_toolbox_item__WEBPACK_IMPORTED_MODULE_60__ =
                __webpack_require__(
                    /*! ../toolbox/toolbox-item */ "./src/toolbox/toolbox-item.ts"
                );
            /* harmony import */ var _toolbox_toolbox_item_group__WEBPACK_IMPORTED_MODULE_61__ =
                __webpack_require__(
                    /*! ../toolbox/toolbox-item-group */ "./src/toolbox/toolbox-item-group.ts"
                );
            /* harmony import */ var _toolbox_toolbox_tool__WEBPACK_IMPORTED_MODULE_62__ =
                __webpack_require__(
                    /*! ../toolbox/toolbox-tool */ "./src/toolbox/toolbox-tool.ts"
                );
            /* harmony import */ var _toolbox_toolbox_list__WEBPACK_IMPORTED_MODULE_63__ =
                __webpack_require__(
                    /*! ../toolbox/toolbox-list */ "./src/toolbox/toolbox-list.ts"
                );
            /* harmony import */ var _header_logo_image__WEBPACK_IMPORTED_MODULE_64__ =
                __webpack_require__(
                    /*! ../header/logo-image */ "./src/header/logo-image.ts"
                );
            /* harmony import */ var _tabs_translation_translation_line_skeleton__WEBPACK_IMPORTED_MODULE_65__ =
                __webpack_require__(
                    /*! ../tabs/translation/translation-line-skeleton */ "./src/tabs/translation/translation-line-skeleton.ts"
                );
            /* harmony import */ var _tabs_translation_translate_from_action__WEBPACK_IMPORTED_MODULE_66__ =
                __webpack_require__(
                    /*! ../tabs/translation/translate-from-action */ "./src/tabs/translation/translate-from-action.ts"
                );
            /* harmony import */ var _utils_survey_widget__WEBPACK_IMPORTED_MODULE_67__ =
                __webpack_require__(
                    /*! ../utils/survey-widget */ "./src/utils/survey-widget.ts"
                );
            /* harmony import */ var _utils_utils__WEBPACK_IMPORTED_MODULE_68__ =
                __webpack_require__(
                    /*! ../utils/utils */ "./src/utils/utils.ts"
                );
            /* harmony import */ var _switcher_switcher__WEBPACK_IMPORTED_MODULE_69__ =
                __webpack_require__(
                    /*! ../switcher/switcher */ "./src/switcher/switcher.ts"
                );
            /* harmony import */ var _creator__WEBPACK_IMPORTED_MODULE_70__ =
                __webpack_require__(/*! ../creator */ "./src/creator.ts");
            /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_71__ =
                __webpack_require__(
                    /*! survey-creator-core */ "survey-creator-core"
                );
            /* harmony import */ var survey_creator_core__WEBPACK_IMPORTED_MODULE_71___default =
                /*#__PURE__*/ __webpack_require__.n(
                    survey_creator_core__WEBPACK_IMPORTED_MODULE_71__
                );
            /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_72__ =
                __webpack_require__(/*! survey-core */ "survey-core");
            /* harmony import */ var survey_core__WEBPACK_IMPORTED_MODULE_72___default =
                /*#__PURE__*/ __webpack_require__.n(
                    survey_core__WEBPACK_IMPORTED_MODULE_72__
                );
            var Version;
            Version = "".concat("1.12.4");

            //custom questions for property grid

            (0, survey_core__WEBPACK_IMPORTED_MODULE_72__.checkLibraryVersion)(
                "".concat("1.12.4"),
                "survey-creator-knockout"
            );

            /******/ return __webpack_exports__;
            /******/
        })();
    }
);
//# sourceMappingURL=survey-creator-knockout.js.map
