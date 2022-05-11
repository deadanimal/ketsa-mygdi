(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["core-admin-admin-module"],{

/***/ "./node_modules/ngx-quill/__ivy_ngcc__/fesm5/ngx-quill.js":
/*!****************************************************************!*\
  !*** ./node_modules/ngx-quill/__ivy_ngcc__/fesm5/ngx-quill.js ***!
  \****************************************************************/
/*! exports provided: QUILL_CONFIG_TOKEN, QuillEditorComponent, QuillModule, QuillViewComponent, QuillViewHTMLComponent, defaultModules */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "QUILL_CONFIG_TOKEN", function() { return QUILL_CONFIG_TOKEN; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "QuillEditorComponent", function() { return QuillEditorComponent; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "QuillModule", function() { return QuillModule; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "QuillViewComponent", function() { return QuillViewComponent; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "QuillViewHTMLComponent", function() { return QuillViewHTMLComponent; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "defaultModules", function() { return defaultModules; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/platform-browser */ "./node_modules/@angular/platform-browser/__ivy_ngcc__/fesm5/platform-browser.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");










var _c0 = [[["", "quill-editor-toolbar", ""]]];
var _c1 = ["[quill-editor-toolbar]"];
var defaultModules = {
    toolbar: [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ header: 1 }, { header: 2 }],
        [{ list: 'ordered' }, { list: 'bullet' }],
        [{ script: 'sub' }, { script: 'super' }],
        [{ indent: '-1' }, { indent: '+1' }],
        [{ direction: 'rtl' }],
        [{ size: ['small', false, 'large', 'huge'] }],
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        [
            { color: [] },
            { background: [] }
        ],
        [{ font: [] }],
        [{ align: [] }],
        ['clean'],
        ['link', 'image', 'video'] // link and image, video
    ]
};

var QUILL_CONFIG_TOKEN = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["InjectionToken"]('config');

var getFormat = function (format, configFormat) {
    var passedFormat = format || configFormat;
    return passedFormat || 'html';
};

var Quill = null;
var QuillEditorComponent = /** @class */ (function () {
    function QuillEditorComponent(elementRef, domSanitizer, doc, platformId, renderer, zone, config) {
        var _this = this;
        this.elementRef = elementRef;
        this.domSanitizer = domSanitizer;
        this.doc = doc;
        this.platformId = platformId;
        this.renderer = renderer;
        this.zone = zone;
        this.config = config;
        this.required = false;
        this.customToolbarPosition = 'top';
        this.sanitize = false;
        this.styles = null;
        this.strict = true;
        this.customOptions = [];
        this.preserveWhitespace = false;
        this.onEditorCreated = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.onEditorChanged = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.onContentChanged = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.onSelectionChanged = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.onFocus = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.onBlur = new _angular_core__WEBPACK_IMPORTED_MODULE_2__["EventEmitter"]();
        this.disabled = false; // used to store initial value before ViewInit
        this.valueGetter = function (quillEditor, editorElement) {
            var html = editorElement.querySelector('.ql-editor').innerHTML;
            if (html === '<p><br></p>' || html === '<div><br></div>') {
                html = null;
            }
            var modelValue = html;
            var format = getFormat(_this.format, _this.config.format);
            if (format === 'text') {
                modelValue = quillEditor.getText();
            }
            else if (format === 'object') {
                modelValue = quillEditor.getContents();
            }
            else if (format === 'json') {
                try {
                    modelValue = JSON.stringify(quillEditor.getContents());
                }
                catch (e) {
                    modelValue = quillEditor.getText();
                }
            }
            return modelValue;
        };
        this.valueSetter = function (quillEditor, value) {
            var format = getFormat(_this.format, _this.config.format);
            if (format === 'html') {
                if (_this.sanitize) {
                    value = _this.domSanitizer.sanitize(_angular_core__WEBPACK_IMPORTED_MODULE_2__["SecurityContext"].HTML, value);
                }
                return quillEditor.clipboard.convert(value);
            }
            else if (format === 'json') {
                try {
                    return JSON.parse(value);
                }
                catch (e) {
                    return [{ insert: value }];
                }
            }
            return value;
        };
        this.selectionChangeHandler = function (range, oldRange, source) {
            var shouldTriggerOnModelTouched = !range && _this.onModelTouched;
            // only emit changes when there's any listener
            if (!_this.onBlur.observers.length &&
                !_this.onFocus.observers.length &&
                !_this.onSelectionChanged.observers.length &&
                !shouldTriggerOnModelTouched) {
                return;
            }
            _this.zone.run(function () {
                if (range === null) {
                    _this.onBlur.emit({
                        editor: _this.quillEditor,
                        source: source
                    });
                }
                else if (oldRange === null) {
                    _this.onFocus.emit({
                        editor: _this.quillEditor,
                        source: source
                    });
                }
                _this.onSelectionChanged.emit({
                    editor: _this.quillEditor,
                    oldRange: oldRange,
                    range: range,
                    source: source
                });
                if (shouldTriggerOnModelTouched) {
                    _this.onModelTouched();
                }
            });
        };
        this.textChangeHandler = function (delta, oldDelta, source) {
            // only emit changes emitted by user interactions
            var text = _this.quillEditor.getText();
            var content = _this.quillEditor.getContents();
            var html = _this.editorElem.querySelector('.ql-editor').innerHTML;
            if (html === '<p><br></p>' || html === '<div><br></div>') {
                html = null;
            }
            var trackChanges = _this.trackChanges || _this.config.trackChanges;
            var shouldTriggerOnModelChange = (source === Quill.sources.USER || trackChanges && trackChanges === 'all') && _this.onModelChange;
            // only emit changes when there's any listener
            if (!_this.onContentChanged.observers.length && !shouldTriggerOnModelChange) {
                return;
            }
            _this.zone.run(function () {
                if (shouldTriggerOnModelChange) {
                    _this.onModelChange(_this.valueGetter(_this.quillEditor, _this.editorElem));
                }
                _this.onContentChanged.emit({
                    content: content,
                    delta: delta,
                    editor: _this.quillEditor,
                    html: html,
                    oldDelta: oldDelta,
                    source: source,
                    text: text
                });
            });
        };
        this.editorChangeHandler = function (event, current, old, source) {
            // only emit changes when there's any listener
            if (!_this.onEditorChanged.observers.length) {
                return;
            }
            // only emit changes emitted by user interactions
            if (event === 'text-change') {
                var text_1 = _this.quillEditor.getText();
                var content_1 = _this.quillEditor.getContents();
                var html_1 = _this.editorElem.querySelector('.ql-editor').innerHTML;
                if (html_1 === '<p><br></p>' || html_1 === '<div><br></div>') {
                    html_1 = null;
                }
                _this.zone.run(function () {
                    _this.onEditorChanged.emit({
                        content: content_1,
                        delta: current,
                        editor: _this.quillEditor,
                        event: event,
                        html: html_1,
                        oldDelta: old,
                        source: source,
                        text: text_1
                    });
                });
            }
            else {
                _this.onEditorChanged.emit({
                    editor: _this.quillEditor,
                    event: event,
                    oldRange: old,
                    range: current,
                    source: source
                });
            }
        };
    }
    QuillEditorComponent_1 = QuillEditorComponent;
    QuillEditorComponent.normalizeClassNames = function (classes) {
        var classList = classes.trim().split(' ');
        return classList.reduce(function (prev, cur) {
            var trimmed = cur.trim();
            if (trimmed) {
                prev.push(trimmed);
            }
            return prev;
        }, []);
    };
    QuillEditorComponent.prototype.onModelChange = function (_modelValue) { };
    QuillEditorComponent.prototype.onModelTouched = function () { };
    QuillEditorComponent.prototype.ngAfterViewInit = function () {
        var _this = this;
        if (Object(_angular_common__WEBPACK_IMPORTED_MODULE_1__["isPlatformServer"])(this.platformId)) {
            return;
        }
        if (!Quill) {
            this.zone.runOutsideAngular(function () {
                Quill = __webpack_require__(/*! quill */ "./node_modules/quill/dist/quill.js");
            });
        }
        this.elementRef.nativeElement.insertAdjacentHTML(this.customToolbarPosition === 'top' ? 'beforeend' : 'afterbegin', this.preserveWhitespace ? '<pre quill-editor-element></pre>' : '<div quill-editor-element></div>');
        this.editorElem = this.elementRef.nativeElement.querySelector('[quill-editor-element]');
        var toolbarElem = this.elementRef.nativeElement.querySelector('[quill-editor-toolbar]');
        var modules = Object.assign({}, this.modules || (this.config.modules || defaultModules));
        if (toolbarElem) {
            modules.toolbar = toolbarElem;
        }
        else if (modules.toolbar === undefined) {
            modules.toolbar = defaultModules.toolbar;
        }
        var placeholder = this.placeholder !== undefined ? this.placeholder : this.config.placeholder;
        if (placeholder === undefined) {
            placeholder = 'Insert text here ...';
        }
        if (this.styles) {
            Object.keys(this.styles).forEach(function (key) {
                _this.renderer.setStyle(_this.editorElem, key, _this.styles[key]);
            });
        }
        if (this.classes) {
            this.addClasses(this.classes);
        }
        this.customOptions.forEach(function (customOption) {
            var newCustomOption = Quill.import(customOption.import);
            newCustomOption.whitelist = customOption.whitelist;
            Quill.register(newCustomOption, true);
        });
        var bounds = this.bounds && this.bounds === 'self' ? this.editorElem : this.bounds;
        if (!bounds) {
            bounds = this.config.bounds ? this.config.bounds : this.doc.body;
        }
        var debug = this.debug;
        if (!debug && debug !== false && this.config.debug) {
            debug = this.config.debug;
        }
        var readOnly = this.readOnly;
        if (!readOnly && this.readOnly !== false) {
            readOnly = this.config.readOnly !== undefined ? this.config.readOnly : false;
        }
        var scrollingContainer = this.scrollingContainer;
        if (!scrollingContainer && this.scrollingContainer !== null) {
            scrollingContainer = this.config.scrollingContainer === null || this.config.scrollingContainer ? this.config.scrollingContainer : null;
        }
        var formats = this.formats;
        if (!formats && formats === undefined) {
            formats = this.config.formats ? Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__spread"])(this.config.formats) : (this.config.formats === null ? null : undefined);
        }
        this.zone.runOutsideAngular(function () {
            _this.quillEditor = new Quill(_this.editorElem, {
                bounds: bounds,
                debug: debug,
                formats: formats,
                modules: modules,
                placeholder: placeholder,
                readOnly: readOnly,
                scrollingContainer: scrollingContainer,
                strict: _this.strict,
                theme: _this.theme || (_this.config.theme ? _this.config.theme : 'snow')
            });
        });
        if (this.content) {
            var format = getFormat(this.format, this.config.format);
            if (format === 'object') {
                this.quillEditor.setContents(this.content, 'silent');
            }
            else if (format === 'text') {
                this.quillEditor.setText(this.content, 'silent');
            }
            else if (format === 'json') {
                try {
                    this.quillEditor.setContents(JSON.parse(this.content), 'silent');
                }
                catch (e) {
                    this.quillEditor.setText(this.content, 'silent');
                }
            }
            else {
                if (this.sanitize) {
                    this.content = this.domSanitizer.sanitize(_angular_core__WEBPACK_IMPORTED_MODULE_2__["SecurityContext"].HTML, this.content);
                }
                var contents = this.quillEditor.clipboard.convert(this.content);
                this.quillEditor.setContents(contents, 'silent');
            }
            this.quillEditor.history.clear();
        }
        // initialize disabled status based on this.disabled as default value
        this.setDisabledState();
        // triggered if selection or text changed
        this.quillEditor.on('editor-change', this.editorChangeHandler);
        // mark model as touched if editor lost focus
        this.quillEditor.on('selection-change', this.selectionChangeHandler);
        // update model if text changes
        this.quillEditor.on('text-change', this.textChangeHandler);
        // trigger created in a timeout to avoid changed models after checked
        // if you are using the editor api in created output to change the editor content
        setTimeout(function () { return _this.onEditorCreated.emit(_this.quillEditor); });
    };
    QuillEditorComponent.prototype.ngOnDestroy = function () {
        if (this.quillEditor) {
            this.quillEditor.off('selection-change', this.selectionChangeHandler);
            this.quillEditor.off('text-change', this.textChangeHandler);
            this.quillEditor.off('editor-change', this.editorChangeHandler);
        }
    };
    QuillEditorComponent.prototype.ngOnChanges = function (changes) {
        var _this = this;
        if (!this.quillEditor) {
            return;
        }
        // tslint:disable:no-string-literal
        if (changes['readOnly']) {
            this.quillEditor.enable(!changes['readOnly'].currentValue);
        }
        if (changes['placeholder']) {
            this.quillEditor.root.dataset.placeholder =
                changes['placeholder'].currentValue;
        }
        if (changes['styles']) {
            var currentStyling = changes['styles'].currentValue;
            var previousStyling = changes['styles'].previousValue;
            if (previousStyling) {
                Object.keys(previousStyling).forEach(function (key) {
                    _this.renderer.removeStyle(_this.editorElem, key);
                });
            }
            if (currentStyling) {
                Object.keys(currentStyling).forEach(function (key) {
                    _this.renderer.setStyle(_this.editorElem, key, _this.styles[key]);
                });
            }
        }
        if (changes['classes']) {
            var currentClasses = changes['classes'].currentValue;
            var previousClasses = changes['classes'].previousValue;
            if (previousClasses) {
                this.removeClasses(previousClasses);
            }
            if (currentClasses) {
                this.addClasses(currentClasses);
            }
        }
        // tslint:enable:no-string-literal
    };
    QuillEditorComponent.prototype.addClasses = function (classList) {
        var _this = this;
        QuillEditorComponent_1.normalizeClassNames(classList).forEach(function (c) {
            _this.renderer.addClass(_this.editorElem, c);
        });
    };
    QuillEditorComponent.prototype.removeClasses = function (classList) {
        var _this = this;
        QuillEditorComponent_1.normalizeClassNames(classList).forEach(function (c) {
            _this.renderer.removeClass(_this.editorElem, c);
        });
    };
    QuillEditorComponent.prototype.writeValue = function (currentValue) {
        this.content = currentValue;
        var format = getFormat(this.format, this.config.format);
        if (this.quillEditor) {
            if (currentValue) {
                if (format === 'text') {
                    this.quillEditor.setText(currentValue);
                }
                else {
                    this.quillEditor.setContents(this.valueSetter(this.quillEditor, this.content));
                }
                return;
            }
            this.quillEditor.setText('');
        }
    };
    QuillEditorComponent.prototype.setDisabledState = function (isDisabled) {
        if (isDisabled === void 0) { isDisabled = this.disabled; }
        // store initial value to set appropriate disabled status after ViewInit
        this.disabled = isDisabled;
        if (this.quillEditor) {
            if (isDisabled) {
                this.quillEditor.disable();
                this.renderer.setAttribute(this.elementRef.nativeElement, 'disabled', 'disabled');
            }
            else {
                if (!this.readOnly) {
                    this.quillEditor.enable();
                }
                this.renderer.removeAttribute(this.elementRef.nativeElement, 'disabled');
            }
        }
    };
    QuillEditorComponent.prototype.registerOnChange = function (fn) {
        this.onModelChange = fn;
    };
    QuillEditorComponent.prototype.registerOnTouched = function (fn) {
        this.onModelTouched = fn;
    };
    QuillEditorComponent.prototype.validate = function () {
        if (!this.quillEditor) {
            return null;
        }
        var err = {};
        var valid = true;
        var textLength = this.quillEditor.getText().trim().length;
        if (this.minLength && textLength && textLength < this.minLength) {
            err.minLengthError = {
                given: textLength,
                minLength: this.minLength
            };
            valid = false;
        }
        if (this.maxLength && textLength > this.maxLength) {
            err.maxLengthError = {
                given: textLength,
                maxLength: this.maxLength
            };
            valid = false;
        }
        if (this.required && !textLength) {
            err.requiredError = {
                empty: true
            };
            valid = false;
        }
        return valid ? null : err;
    };
    var QuillEditorComponent_1;
    QuillEditorComponent.ctorParameters = function () { return [
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"],] }] },
        { type: _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"],] }] },
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_common__WEBPACK_IMPORTED_MODULE_1__["DOCUMENT"],] }] },
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"],] }] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"],] }] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"],] }] },
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [QUILL_CONFIG_TOKEN,] }] }
    ]; };
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "format", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "theme", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "modules", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "debug", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "readOnly", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "placeholder", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "maxLength", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "minLength", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "required", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "formats", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "customToolbarPosition", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "sanitize", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "styles", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "strict", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "scrollingContainer", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "bounds", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "customOptions", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "trackChanges", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "preserveWhitespace", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "classes", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onEditorCreated", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onEditorChanged", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onContentChanged", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onSelectionChanged", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onFocus", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"])()
    ], QuillEditorComponent.prototype, "onBlur", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "valueGetter", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillEditorComponent.prototype, "valueSetter", void 0);
    QuillEditorComponent = QuillEditorComponent_1 = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([ Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(1, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(2, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_common__WEBPACK_IMPORTED_MODULE_1__["DOCUMENT"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(3, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(4, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(5, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(6, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(QUILL_CONFIG_TOKEN))
    ], QuillEditorComponent);
QuillEditorComponent.ɵfac = function QuillEditorComponent_Factory(t) { return new (t || QuillEditorComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_common__WEBPACK_IMPORTED_MODULE_1__["DOCUMENT"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](QUILL_CONFIG_TOKEN)); };
QuillEditorComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineComponent"]({ type: QuillEditorComponent, selectors: [["quill-editor"]], inputs: { required: "required", customToolbarPosition: "customToolbarPosition", sanitize: "sanitize", styles: "styles", strict: "strict", customOptions: "customOptions", preserveWhitespace: "preserveWhitespace", valueGetter: "valueGetter", valueSetter: "valueSetter", format: "format", theme: "theme", modules: "modules", debug: "debug", readOnly: "readOnly", placeholder: "placeholder", maxLength: "maxLength", minLength: "minLength", formats: "formats", scrollingContainer: "scrollingContainer", bounds: "bounds", trackChanges: "trackChanges", classes: "classes" }, outputs: { onEditorCreated: "onEditorCreated", onEditorChanged: "onEditorChanged", onContentChanged: "onContentChanged", onSelectionChanged: "onSelectionChanged", onFocus: "onFocus", onBlur: "onBlur" }, features: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵProvidersFeature"]([
            {
                multi: true,
                provide: _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NG_VALUE_ACCESSOR"],
                // eslint-disable-next-line @typescript-eslint/no-use-before-define
                useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["forwardRef"])(function () { return QuillEditorComponent_1; })
            },
            {
                multi: true,
                provide: _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NG_VALIDATORS"],
                // eslint-disable-next-line @typescript-eslint/no-use-before-define
                useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["forwardRef"])(function () { return QuillEditorComponent_1; })
            }
        ]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵNgOnChangesFeature"]()], ngContentSelectors: _c1, decls: 1, vars: 0, template: function QuillEditorComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵprojectionDef"](_c0);
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵprojection"](0);
    } }, encapsulation: 2 });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵsetClassMetadata"](QuillEditorComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Component"],
        args: [{
                encapsulation: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ViewEncapsulation"].None,
                providers: [
                    {
                        multi: true,
                        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NG_VALUE_ACCESSOR"],
                        // eslint-disable-next-line @typescript-eslint/no-use-before-define
                        useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["forwardRef"])(function () { return QuillEditorComponent_1; })
                    },
                    {
                        multi: true,
                        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_4__["NG_VALIDATORS"],
                        // eslint-disable-next-line @typescript-eslint/no-use-before-define
                        useExisting: Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["forwardRef"])(function () { return QuillEditorComponent_1; })
                    }
                ],
                selector: 'quill-editor',
                template: "\n  <ng-content select=\"[quill-editor-toolbar]\"></ng-content>\n"
            }]
    }], function () { return [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"]]
            }] }, { type: _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"]]
            }] }, { type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_common__WEBPACK_IMPORTED_MODULE_1__["DOCUMENT"]]
            }] }, { type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"]]
            }] }, { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"]]
            }] }, { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["NgZone"]]
            }] }, { type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [QUILL_CONFIG_TOKEN]
            }] }]; }, { required: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], customToolbarPosition: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], sanitize: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], styles: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], strict: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], customOptions: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], preserveWhitespace: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], onEditorCreated: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], onEditorChanged: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], onContentChanged: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], onSelectionChanged: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], onFocus: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], onBlur: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Output"]
        }], valueGetter: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], valueSetter: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], format: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], theme: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], modules: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], debug: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], readOnly: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], placeholder: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], maxLength: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], minLength: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], formats: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], scrollingContainer: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], bounds: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], trackChanges: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], classes: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }] }); })();
    return QuillEditorComponent;
}());

var QuillViewHTMLComponent = /** @class */ (function () {
    function QuillViewHTMLComponent(sanitizer, config) {
        this.sanitizer = sanitizer;
        this.config = config;
        this.innerHTML = '';
        this.themeClass = 'ql-snow';
        this.content = '';
    }
    QuillViewHTMLComponent.prototype.ngOnChanges = function (changes) {
        if (changes.theme) {
            var theme = changes.theme.currentValue || (this.config.theme ? this.config.theme : 'snow');
            this.themeClass = "ql-" + theme + " ngx-quill-view-html";
        }
        else if (!this.theme) {
            var theme = this.config.theme ? this.config.theme : 'snow';
            this.themeClass = "ql-" + theme + " ngx-quill-view-html";
        }
        if (changes.content) {
            this.innerHTML = this.sanitizer.bypassSecurityTrustHtml(changes.content.currentValue);
        }
    };
    QuillViewHTMLComponent.ctorParameters = function () { return [
        { type: _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"],] }] },
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [QUILL_CONFIG_TOKEN,] }] }
    ]; };
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewHTMLComponent.prototype, "content", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewHTMLComponent.prototype, "theme", void 0);
    QuillViewHTMLComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([ Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(1, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(QUILL_CONFIG_TOKEN))
    ], QuillViewHTMLComponent);
QuillViewHTMLComponent.ɵfac = function QuillViewHTMLComponent_Factory(t) { return new (t || QuillViewHTMLComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](QUILL_CONFIG_TOKEN)); };
QuillViewHTMLComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineComponent"]({ type: QuillViewHTMLComponent, selectors: [["quill-view-html"]], inputs: { content: "content", theme: "theme" }, features: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵNgOnChangesFeature"]()], decls: 2, vars: 2, consts: [[1, "ql-container", 3, "ngClass"], [1, "ql-editor", 3, "innerHTML"]], template: function QuillViewHTMLComponent_Template(rf, ctx) { if (rf & 1) {
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵelementStart"](0, "div", 0);
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵelement"](1, "div", 1);
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵelementEnd"]();
    } if (rf & 2) {
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵproperty"]("ngClass", ctx.themeClass);
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵadvance"](1);
        _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵproperty"]("innerHTML", ctx.innerHTML, _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵsanitizeHtml"]);
    } }, directives: [_angular_common__WEBPACK_IMPORTED_MODULE_1__["NgClass"]], styles: ["\n.ql-container.ngx-quill-view-html {\n  border: 0;\n}\n"], encapsulation: 2 });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵsetClassMetadata"](QuillViewHTMLComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Component"],
        args: [{
                encapsulation: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ViewEncapsulation"].None,
                selector: 'quill-view-html',
                template: "\n  <div class=\"ql-container\" [ngClass]=\"themeClass\">\n    <div class=\"ql-editor\" [innerHTML]=\"innerHTML\">\n    </div>\n  </div>\n",
                styles: ["\n.ql-container.ngx-quill-view-html {\n  border: 0;\n}\n"]
            }]
    }], function () { return [{ type: _angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_platform_browser__WEBPACK_IMPORTED_MODULE_3__["DomSanitizer"]]
            }] }, { type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [QUILL_CONFIG_TOKEN]
            }] }]; }, { content: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], theme: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }] }); })();
    return QuillViewHTMLComponent;
}());

var Quill$1 = null;
var QuillViewComponent = /** @class */ (function () {
    function QuillViewComponent(platformId, config, renderer, elementRef) {
        var _this = this;
        this.platformId = platformId;
        this.config = config;
        this.renderer = renderer;
        this.elementRef = elementRef;
        this.strict = true;
        this.customOptions = [];
        this.preserveWhitespace = false;
        this.valueSetter = function (quillEditor, value) {
            var format = getFormat(_this.format, _this.config.format);
            var content = value;
            if (format === 'html' || format === 'text') {
                content = quillEditor.clipboard.convert(value);
            }
            else if (format === 'json') {
                try {
                    content = JSON.parse(value);
                }
                catch (e) {
                    content = [{ insert: value }];
                }
            }
            quillEditor.setContents(content);
        };
    }
    QuillViewComponent.prototype.ngOnChanges = function (changes) {
        if (!this.quillEditor) {
            return;
        }
        if (changes.content) {
            this.valueSetter(this.quillEditor, changes.content.currentValue);
        }
    };
    QuillViewComponent.prototype.ngAfterViewInit = function () {
        if (Object(_angular_common__WEBPACK_IMPORTED_MODULE_1__["isPlatformServer"])(this.platformId)) {
            return;
        }
        if (!Quill$1) {
            Quill$1 = __webpack_require__(/*! quill */ "./node_modules/quill/dist/quill.js");
        }
        var modules = Object.assign({}, this.modules || (this.config.modules || defaultModules));
        modules.toolbar = false;
        this.customOptions.forEach(function (customOption) {
            var newCustomOption = Quill$1.import(customOption.import);
            newCustomOption.whitelist = customOption.whitelist;
            Quill$1.register(newCustomOption, true);
        });
        var debug = this.debug;
        if (!debug && debug !== false && this.config.debug) {
            debug = this.config.debug;
        }
        var formats = this.formats;
        if (!formats && formats === undefined) {
            formats = this.config.formats ? Object.assign({}, this.config.formats) : (this.config.formats === null ? null : undefined);
        }
        var theme = this.theme || (this.config.theme ? this.config.theme : 'snow');
        this.elementRef.nativeElement.insertAdjacentHTML('afterbegin', this.preserveWhitespace ? '<pre quill-view-element></pre>' : '<div quill-view-element></div>');
        this.editorElem = this.elementRef.nativeElement.querySelector('[quill-view-element]');
        this.quillEditor = new Quill$1(this.editorElem, {
            debug: debug,
            formats: formats,
            modules: modules,
            readOnly: true,
            strict: this.strict,
            theme: theme
        });
        this.renderer.addClass(this.editorElem, 'ngx-quill-view');
        if (this.content) {
            this.valueSetter(this.quillEditor, this.content);
        }
    };
    QuillViewComponent.ctorParameters = function () { return [
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"],] }] },
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [QUILL_CONFIG_TOKEN,] }] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"],] }] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"], decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"],] }] }
    ]; };
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "format", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "theme", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "modules", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "debug", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "formats", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "strict", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "content", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "customOptions", void 0);
    Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"])()
    ], QuillViewComponent.prototype, "preserveWhitespace", void 0);
    QuillViewComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([ Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(1, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(QUILL_CONFIG_TOKEN)),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(2, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(3, Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"]))
    ], QuillViewComponent);
QuillViewComponent.ɵfac = function QuillViewComponent_Factory(t) { return new (t || QuillViewComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](QUILL_CONFIG_TOKEN), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"]), _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"])); };
QuillViewComponent.ɵcmp = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineComponent"]({ type: QuillViewComponent, selectors: [["quill-view"]], inputs: { strict: "strict", customOptions: "customOptions", preserveWhitespace: "preserveWhitespace", format: "format", theme: "theme", modules: "modules", debug: "debug", formats: "formats", content: "content" }, features: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵNgOnChangesFeature"]()], decls: 0, vars: 0, template: function QuillViewComponent_Template(rf, ctx) { }, styles: ["\n.ql-container.ngx-quill-view {\n  border: 0;\n}\n"], encapsulation: 2 });
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵsetClassMetadata"](QuillViewComponent, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Component"],
        args: [{
                encapsulation: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ViewEncapsulation"].None,
                selector: 'quill-view',
                template: "\n",
                styles: ["\n.ql-container.ngx-quill-view {\n  border: 0;\n}\n"]
            }]
    }], function () { return [{ type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["PLATFORM_ID"]]
            }] }, { type: undefined, decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [QUILL_CONFIG_TOKEN]
            }] }, { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["Renderer2"]]
            }] }, { type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"], decorators: [{
                type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Inject"],
                args: [_angular_core__WEBPACK_IMPORTED_MODULE_2__["ElementRef"]]
            }] }]; }, { strict: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], customOptions: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], preserveWhitespace: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], format: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], theme: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], modules: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], debug: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], formats: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }], content: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["Input"]
        }] }); })();
    return QuillViewComponent;
}());

var QuillModule = /** @class */ (function () {
    function QuillModule() {
    }
    QuillModule_1 = QuillModule;
    QuillModule.forRoot = function (config) {
        return {
            ngModule: QuillModule_1,
            providers: [
                {
                    provide: QUILL_CONFIG_TOKEN,
                    useValue: config || { modules: defaultModules }
                }
            ]
        };
    };
    var QuillModule_1;
QuillModule.ɵmod = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineNgModule"]({ type: QuillModule });
QuillModule.ɵinj = _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineInjector"]({ factory: function QuillModule_Factory(t) { return new (t || QuillModule)(); }, providers: [], imports: [[_angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"]]] });
(function () { (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵsetNgModuleScope"](QuillModule, { declarations: function () { return [QuillEditorComponent,
        QuillViewComponent,
        QuillViewHTMLComponent]; }, imports: function () { return [_angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"]]; }, exports: function () { return [QuillEditorComponent,
        QuillViewComponent,
        QuillViewHTMLComponent]; } }); })();
/*@__PURE__*/ (function () { _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵsetClassMetadata"](QuillModule, [{
        type: _angular_core__WEBPACK_IMPORTED_MODULE_2__["NgModule"],
        args: [{
                declarations: [
                    QuillEditorComponent,
                    QuillViewComponent,
                    QuillViewHTMLComponent
                ],
                exports: [QuillEditorComponent, QuillViewComponent, QuillViewHTMLComponent],
                imports: [_angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"]],
                providers: []
            }]
    }], function () { return []; }, null); })();
    return QuillModule;
}());

/**
 * Generated bundle index. Do not edit.
 */



//# sourceMappingURL=ngx-quill.js.map

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/dashboard/dashboard.component.html":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/dashboard/dashboard.component.html ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n\t<div class=\"container-fluid\">\n\t\t<div class=\"header-body\">\n\t\t\t<div class=\"row align-items-center py-4\">\n\t\t\t\t<div class=\"col-lg-6 col-7\">\n\t\t\t\t\t<h6 class=\"h2 text-dark d-inline-block mb-0\">Dashboard</h6>\n\n\t\t\t\t\t<nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\t\t\t\t\t\t<ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n\t\t\t\t\t\t\t<li class=\" breadcrumb-item\">\n\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\"> <i class=\"fas fa-desktop text-dark\"> </i> </a>\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t<li aria-current=\"page\" class=\"breadcrumb-item active\">\n\t\t\t\t\t\t\t\tDashboard\n\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t</ol>\n\t\t\t\t\t</nav>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"col-lg-6 col-5 text-right\">\n\t\t\t\t\t<!-- <a class=\"btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n\n\t\t\t\t\t<a class=\"btn btn-sm btn-neutral\" href=\"javascript:void(0)\">\n\t\t\t\t\t\tFilters\n\t\t\t\t\t</a> -->\n\t\t\t\t</div>\n\t\t\t</div>\n\n\t\t\t<div class=\"row\">\n\t\t\t\t<div class=\"col-xl-12 col-md-6\">\n\t\t\t\t\t<div class=\"card card-stats bg-gradient-info\">\n\t\t\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t\t\t<div class=\"row\">\n\t\t\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t\t\t<h2 class=\"card-title font-weight-bold text-uppercase mb-0\">\n\t\t\t\t\t\t\t\t\t\tJumlah Metadata Yang Telah Diterbitkan\n\t\t\t\t\t\t\t\t\t</h2>\n\n\t\t\t\t\t\t\t\t\t<span class=\"h4 text-grey text-uppercase mb-0\"> Agensi: Kementerian Sumber dan\n\t\t\t\t\t\t\t\t\t\tAsli</span>\n\t\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t\t\t<div class=\" icon icon-shape bg-gradient-info text-white rounded-circle shadow\">\n\t\t\t\t\t\t\t\t\t\t<i class=\"ni ni-chart-bar-32\"> </i>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t\t<p class=\"mt-2 mb-0 text-sm\">\n\t\t\t\t\t\t\t\t<span class=\"h2 mr-2\">234\n\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-6\">\n\t\t\t<div class=\" card\">\n\t\t\t\t<div class=\" card-header bg-secondary\">\n\t\t\t\t\t<h6 class=\" surtitle\">Performance</h6>\n\n\t\t\t\t\t<h5 class=\" h2 mb-0\">Jumlah Metadata Diterbitkan Mengikut Bahagian dalam Agensi</h5>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\" card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"chartdiv\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\n\t\t<div class=\"col-xl-6\">\n\t\t\t<div class=\"card\">\n\t\t\t\t<div class=\"card-header bg-secondary\">\n\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h6 class=\"surtitle\">Chart</h6>\n\n\t\t\t\t\t\t\t<h5 class=\"h2 mb-0\">Jumlah Metadata Diterbitkan Mengikut Agensi di Malaysia</h5>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"chartdiv2\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-12\">\n\t\t\t<div class=\"card\">\n\t\t\t\t<div class=\"card-header bg-secondary\">\n\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h6 class=\"surtitle\">Bar Chart</h6>\n\n\t\t\t\t\t\t\t<h5 class=\"h2 mb-0\">Jumlah Metadata Diterbitkan Mengikutkan Tahun</h5>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"chartdiv3\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-12\">\n\t\t\t<div class=\"card\">\n\t\t\t\t<div class=\"card-header bg-secondary\">\n\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h6 class=\"surtitle\">Pie Chart</h6>\n\n\t\t\t\t\t\t\t<h5 class=\"h2 mb-0\">Jumlah Metadata Diterbitkan Mengikutkan Kategori</h5>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"piechartdiv\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-4\">\n\t\t\t<div class=\"card card-stats bg-gradient-info\">\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"row\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h2 class=\"card-title font-weight-bold text-uppercase mb-0\">\n\t\t\t\t\t\t\t\tBilangan Keseluruhan Permohonan Data\n\t\t\t\t\t\t\t</h2>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t<div class=\" icon icon-shape bg-warning text-white rounded-circle shadow\">\n\t\t\t\t\t\t\t\t<i class=\"fas fa-paste\"> </i>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\n\t\t\t\t\t<p class=\"mt-2 mb-0 text-sm\">\n\t\t\t\t\t\t<span class=\"h2 mr-2\">234\n\t\t\t\t\t\t</span>\n\t\t\t\t\t</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"col-xl-4\">\n\t\t\t<div class=\"card card-stats bg-gradient-info\">\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"row\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h2 class=\"card-title font-weight-bold text-uppercase mb-0\">\n\t\t\t\t\t\t\t\tBilangan Permohonan Data Diluluskan\n\t\t\t\t\t\t\t</h2>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t<div class=\" icon icon-shape bg-success text-white rounded-circle shadow\">\n\t\t\t\t\t\t\t\t<i class=\"fas fa-calendar-check\"> </i>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\n\t\t\t\t\t<p class=\"mt-2 mb-0 text-sm\">\n\t\t\t\t\t\t<span class=\"h2 mr-2\">234\n\t\t\t\t\t\t</span>\n\t\t\t\t\t</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t\t<div class=\"col-xl-4\">\n\t\t\t<div class=\"card card-stats bg-gradient-info\">\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"row\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h2 class=\"card-title font-weight-bold text-uppercase mb-0\">\n\t\t\t\t\t\t\t\tBilangan Permohonan Data Ditolak\n\t\t\t\t\t\t\t</h2>\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"col-auto\">\n\t\t\t\t\t\t\t<div class=\" icon icon-shape bg-danger text-white rounded-circle shadow\">\n\t\t\t\t\t\t\t\t<i class=\"fas fa-calendar-times\"> </i>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\n\t\t\t\t\t<p class=\"mt-2 mb-0 text-sm\">\n\t\t\t\t\t\t<span class=\"h2 mr-2\">234\n\t\t\t\t\t\t</span>\n\t\t\t\t\t</p>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-12\">\n\t\t\t<div class=\"card\">\n\t\t\t\t<div class=\"card-header bg-secondary\">\n\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h6 class=\"surtitle\">Bar Chart</h6>\n\n\t\t\t\t\t\t\t<h5 class=\"h2 mb-0\">Jumlah Permohonan Data Mengikutkan Tahun</h5>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"chartdiv4\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class=\"row\">\n\t\t<div class=\"col-xl-12\">\n\t\t\t<div class=\"card\">\n\t\t\t\t<div class=\"card-header bg-secondary\">\n\t\t\t\t\t<div class=\"row align-items-center\">\n\t\t\t\t\t\t<div class=\"col\">\n\t\t\t\t\t\t\t<h6 class=\"surtitle\">Pie Chart</h6>\n\n\t\t\t\t\t\t\t<h5 class=\"h2 mb-0\">Jumlah Permohonan Data Mengikutkan Kategori</h5>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\n\t\t\t\t<div class=\"card-body\">\n\t\t\t\t\t<div class=\"chart\">\n\t\t\t\t\t\t<div class=\"amchart\" id=\"piechartdiv2\"></div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/datatable/datatable.component.html":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/datatable/datatable.component.html ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n  <div class=\" container-fluid\">\n    <div class=\" header-body\">\n      <div class=\" row align-items-center py-4\">\n        <div class=\" col-lg-8 col-7\">\n          <h6 class=\" h2 d-inline-block mb-0\">Senarai Metadata</h6>\n\n          <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n            <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n              <li class=\" breadcrumb-item\">\n                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Pengurusan Metadata\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Senarai Metadata\n              </li>\n\n            </ol>\n          </nav>\n        </div>\n\n        <div class=\" col-lg-4 col-5 text-right\">\n          <!--\n            <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n  \n            <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\">\n              Filters\n            </a> -->\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n  <div class=\" row\">\n    <div class=\" col\">\n      <div class=\" card\">\n        <div class=\" card-header\">\n          <div class=\"row mb-0\">\n            <div class=\"col-sm-12 col-md-6\">\n              <div class=\"dataTables_length\" id=\"datatable_length\">\n                <label>\n                  Show\n                  <select name=\"datatable_length\" aria-controls=\"datatable\" class=\"form-control form-control-sm\"\n                    (change)=\"entriesChange($event)\">\n\n                    <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                    <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                    <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                    <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                    <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                  </select>\n                  entries\n                </label>\n              </div>\n            </div>\n            <div class=\"col-sm-12 col-md-6\">\n              <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                <label>\n                  <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                    aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                </label>\n              </div>\n            </div>\n          </div>\n\n        </div>\n        <div class=\"dataTables_wrapper py-4\">\n          <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\" [footerHeight]=\"50\"\n            [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n            (activate)=\"onActivate($event)\">\n\n            <ngx-datatable-column name=\"Bil\" [width]=\"80\">\n              <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                {{rowIndex+1}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Metadata\" [width]=\"300\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Kategori\" [width]=\"100\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Status\" [width]=\"100\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Tindakan\" [width]=\"200\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                <a class=\"text-green\" href=\"javascript:void(0)\"><i class=\"fas fa-eye mr-3\"></i></a>\n                <a href=\"javascript:void(0)\"><i class=\"fas fa-edit mr-3\"></i></a>\n                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n              </ng-template>\n            </ngx-datatable-column>\n\n          </ngx-datatable>\n        </div>\n      </div>\n      <!-- <div class=\"card\">\n          <!-- Card header \n          <div class=\"card-header\">\n            <h3 class=\"mb-0\">Selecting Rows</h3>\n            <p class=\"text-sm mb-0\">\n              This is an exmaple of datatable using the well known ngx-datatable\n              plugin. This is a minimal setup in order to get started fast.\n            </p>\n          </div>\n          <div class=\"dataTables_wrapper py-4\">\n            <div class=\"row\">\n              <div class=\"col-sm-12 col-md-6\">\n                <div class=\"dataTables_length\" id=\"datatable_length\">\n                  <label>\n                    Show\n                    <select\n                      name=\"datatable_length\"\n                      aria-controls=\"datatable\"\n                      class=\"form-control form-control-sm\"\n                      (change)=\"entriesChange($event)\"\n                    >\n                      <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                      <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                      <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                      <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                    </select>\n                    entries\n                  </label>\n                </div>\n              </div>\n              <div class=\"col-sm-12 col-md-6\">\n                <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input\n                      type=\"search\"\n                      class=\"form-control form-control-sm\"\n                      placeholder=\"Search records\"\n                      aria-controls=\"datatable\"\n                      (keyup)=\"filterTable($event)\"\n                    />\n                  </label>\n                </div>\n              </div>\n            </div>\n  \n            <ngx-datatable\n              id=\"print-section\"\n              class=\"bootstrap selection-cell\"\n              [columnMode]=\"'force'\"\n              [headerHeight]=\"50\"\n              [footerHeight]=\"50\"\n              [rowHeight]=\"'auto'\"\n              [limit]=\"entries != -1 ? entries : undefined\"\n              [rows]=\"temp\"\n              [selected]=\"selected\"\n              [selectionType]=\"'multiClick'\"\n              (activate)=\"onActivate($event)\"\n              (select)=\"onSelect($event)\"\n            >\n              <ngx-datatable-column name=\"Name\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Position\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Office\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Age\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Start\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Salary\"></ngx-datatable-column>\n            </ngx-datatable>\n          </div>\n        </div> -->\n    </div>\n  </div>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/feedback/feedback.component.html":
/*!***************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/feedback/feedback.component.html ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-6 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Maklum Balas Pelanggan</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-users text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Maklum Balas\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n                <div class=\"col-lg-6 col-5 text-right\">\n                    <!--<a class=\"btn btn-default btn-sm text-white btn-icon btn-3\" (click)=\"openModal(addCategory)\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Kategori</span>\n                    </a> -->\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n\n        <div class=\"col-xl-12 order-xl-1\">\n            <div class=\"card\">\n                <div class=\"card-header\">\n                    <div class=\"text-center\">\n                        <h3>Senarai Maklum Balas</h3>\n                    </div>\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" [selected]=\"selected\" [selectionType]=\"'single'\" (activate)=\"onActivate($event)\">\n                        <ngx-datatable-column name=\"No\" [width]=\"20\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tajuk\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Emel\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a class=\"text-green\" (click)=\"openModal(replyFeedback)\"><i\n                                        class=\"fas fa-reply mr-2\"></i><span>Balas</span></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n\n<ng-template #replyFeedback>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Maklum Balas Kepada Pelanggan\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Pertanyaan Pelanggan</label>\n                <textarea class=\"form-control\" formControlName=\"name\" type=\"text\" rows=\"4\"></textarea>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Perincian Maklum Balas</label>\n                <form>\n                    <quill-editor></quill-editor>\n                </form>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Emel Pelanggan</label>\n                <input class=\"form-control\" formControlName=\"email\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\">\n            Hantar\n        </button>\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Batal\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Kategori Maklum Balas\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Kategori\" formControlName=\"category\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\">\n            Tambah\n        </button>\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Tutup\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-annoucement/management-annoucement.component.html":
/*!*******************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-annoucement/management-annoucement.component.html ***!
  \*******************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-8 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Kongfigurasi Pengumuman</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Portal\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengumuman\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n                <div class=\"col-lg-4 col-5 text-right\">\n                    <a \n                        *ngIf=\"!editEnabled\"\n                        class=\"btn btn-default btn-sm text-white btn-icon btn-3\" \n                        (click)=\"toggleEdit()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Pengumuman</span>\n                    </a>\n                    <a\n                        *ngIf=\"editEnabled\"\n                        class=\"btn btn-danger btn-sm text-white btn-icon btn-3\" \n                        (click)=\"toggleEdit()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n                        <span class=\"btn-inner--text\">Balik</span>\n                    </a>\n                    <a \n                        *ngIf=\"editEnabled\"\n                        class=\"btn btn-success btn-sm text-white btn-icon btn-3\" \n                        (click)=\"confirmSave()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-save\"></i></span>\n                        <span class=\"btn-inner--text\">Simpan</span>\n                    </a>\n\t\t\t\t</div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col-xl-7 order-xl-2\">\n        <div class=\"card\">\n            <div class=\"card-header bg-primary\">\n                <h3 *ngIf=\"!editEnabled\" class=\"text-white mb-0\">Perincian Pengumuman</h3>\n                <h3 *ngIf=\"editEnabled\" class=\"text-white mb-0\">Tambah Pengumuman</h3>\n            </div>\n            <div class=\"card-body\">\n                <form>\n                    <div class=\"form-group\">\n                        <label class=\"form-control-label\">Tajuk</label>\n                        <input \n                          class=\"form-control\"\n                          formControlName=\"name\"\n                          type=\"text\">\n                    </div>\n                    <div class=\"form-group\">\n                        <label class=\"form-control-label\">Kandungan</label>\n                        <form><quill-editor></quill-editor></form>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"col\">\n                            <div class=\"form-group\">\n                                <label class=\"form-control-label\">Tarikh Mula Paparan</label>\n                                <input \n                                class=\"form-control\"\n                                formControlName=\"startdate\"\n                                type=\"date\">\n                            </div>\n                        </div>\n                        <div class=\"col\">\n                            <div class=\"form-group\">\n                                <label class=\"form-control-label\">Tarikh Tamat Paparan</label>\n                                <input \n                                class=\"form-control\"\n                                formControlName=\"enddate\"\n                                type=\"date\">\n                            </div>\n                        </div>\n                    </div>\n                </form>\n            </div>\n        </div>\n        </div>\n\n        <div class=\"col-xl-5 order-xl-1\">\n            <div class=\"card\">\n                <div class=\"card-header\">\n                    <div class=\"text-center\">\n                        <h3>Senarai Tajuk Pengumuman</h3>\n                    </div>\n                </div>\n\n                <div class=\"card-body\">\n                    <div class=\"dataTables_wrapper py-4\">\n                        <ngx-datatable\n                            class=\"bootstrap selection-cell\"\n                            [columnMode]=\"'force'\"\n                            [headerHeight]=\"50\"\n                            [footerHeight]=\"50\"\n                            [rowHeight]=\"'auto'\"\n                            [limit]=\"entries != -1 ? entries : undefined\"\n                            [rows]=\"temp\"\n                            [selected]=\"selected\"\n                            [selectionType]=\"'single'\"\n                            (activate)=\"onActivate($event)\"\n                            \n                            >\n                          <ngx-datatable-column name=\"No\" [width]=\"100\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                              {{rowIndex+1}}\n                            </ng-template>\n                          </ngx-datatable-column>\n                          <ngx-datatable-column name=\"Tajuk\" [width]=\"300\"></ngx-datatable-column>\n                          \n                          \n                        </ngx-datatable>\n                      </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button\n            aria-label=\"Close\"\n            class=\"close\"\n            data-dismiss=\"modal\"\n            type=\"button\"\n            (click)=\"closeModal()\"\n        >\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input \n                  class=\"form-control\"\n                  placeholder=\"Masukkan Kategori\"\n                  formControlName=\"category\"\n                  type=\"text\"\n                >\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button \n            class=\"btn btn-success\"\n            type=\"button\"\n            (click)=\"confirm()\"\n        >\n            Tambah\n        </button>\n\n        <button\n            class=\"btn btn-outline-danger ml-auto\"\n            data-dismiss=\"modal\"\n            type=\"button\"\n            (click)=\"closeModal()\"\n        >\n            Tutup\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-appstatus/management-appstatus.component.html":
/*!***************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-appstatus/management-appstatus.component.html ***!
  \***************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-8 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Status Permohonan</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Data Asas\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Status Permohonan\n                            </li>\n\n                        </ol>\n                    </nav>\n                </div>\n\n                <div class=\" col-lg-4 col-5 text-right\">\n                    <!--\n                <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n               -->\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <!-- <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                      aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                  </label>\n                </div> -->\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\" [scrollbarH]=\"true\">\n\n                        <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>Nama Permohonan</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.namapermohonan}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>Nama Pemohon</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.namapemohon}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Status\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a *ngIf=\"row.status == 'Baru'\" class=\"badge badge-pill badge-success\">Baru</a>\n                                <a *ngIf=\"row.status == 'Ditolak'\" class=\"badge badge-pill badge-danger\">Ditolak</a>\n                                <a *ngIf=\"row.status == 'Dalam Proses'\" class=\"badge badge-pill badge-primary\">Dalam Proses</a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Muat Turun\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a *ngIf=\"row.download_st == 'Selesai'\" class=\"badge badge-pill badge-success\">Selesai</a>\n                                <a *ngIf=\"row.download_st == 'Tidak'\" class=\"badge badge-pill badge-danger\">Tidak</a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Penilaian\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a *ngIf=\"row.valuation_st == 'Selesai'\" class=\"badge badge-pill badge-success\">Selesai</a>\n                                <a *ngIf=\"row.valuation_st == 'Tidak'\" class=\"badge badge-pill badge-danger\">Tidak</a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #startTask>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Proses Data\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <h6 class=\"heading text-dark\">Senarai Data Yang Dipohon</h6>\n            <div class=\"dataTables_wrapper py-4\">\n                <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                    [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries2 != -1 ? entries2 : undefined\"\n                    [rows]=\"temp\" (activate)=\"onActivate($event)\">\n\n                    <ngx-datatable-column name=\"Bil\">\n                        <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                            {{rowIndex+1}}\n                        </ng-template>\n                    </ngx-datatable-column>\n                    <ngx-datatable-column name=\"Lapisan Data\"></ngx-datatable-column>\n                    <ngx-datatable-column name=\"Sub-Kategori\"></ngx-datatable-column>\n                    <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n                    <ngx-datatable-column name=\"Kawasan Data\"></ngx-datatable-column>\n                    <ngx-datatable-column name=\"Saiz × Harga\">\n                        <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                            <div class=\"form-inline\">\n                                <input class=\"form-control form-control-sm\" placeholder=\"Saiz\" style=\"width: 90px;\"\n                                    type=\"text\">\n                                <label class=\"ml-2\">× RM40</label>\n                            </div>\n\n                        </ng-template>\n                    </ngx-datatable-column>\n\n                </ngx-datatable>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-xl-12\">\n                    <div class=\"form-inline float-right\">\n                        <label class=\"form-control-label mr-2\">Jumlah Harga</label>\n                        <input class=\"form-control form-control-sm\" placeholder=\"RM0.00\" style=\"width: 90px;\"\n                            type=\"text\" disabled>\n                    </div>\n                </div>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-xl-6\">\n                    <div class=\"form-group\">\n                        <label class=\"form-control-label mr-2\">Pautan Data </label>\n                        <input class=\"form-control form-control-sm mb-2\" placeholder=\"\" type=\"text\">\n\n                        <label class=\"form-control-label mr-2\">Tempoh Muat Turun </label>\n                        <input class=\"form-control form-control-sm\" placeholder=\"\" type=\"text\">\n                    </div>\n                    <div class=\"form-inline\">\n                        <label class=\"form-control-label mr-2\">Surat Balasan Permohonan </label>\n                        <button class=\"btn btn-sm btn-danger mb-2\" type=\"button\" (click)=\"confirm()\">\n                            Kemaskini\n                        </button>\n                    </div>\n                </div>\n                <div class=\"col-xl-6 pt-9 text-right\">\n                    <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n                        Hantar\n                    </button>\n                </div>\n            </div>\n        </form>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-audit/management-audit.component.html":
/*!*******************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-audit/management-audit.component.html ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n\t<div class=\"container-fluid\">\n\t\t<div class=\"header-body\">\n\t\t\t<div class=\"row align-items-center py-4\">\n\t\t\t\t<div class=\"col-lg-6 col-7\">\n\t\t\t\t\t<h6 class=\"h2 text-dark d-inline-block mb-0\">Audit Trails</h6>\n\n\t\t\t\t\t<nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\t\t\t\t\t\t<ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n\t\t\t\t\t\t\t<li class=\"breadcrumb-item\">\n\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\"> \n                  <i class=\"fas fa-file-invoice text-dark\"></i> \n                </a>             \n              </li>\n              <li class=\"breadcrumb-item\">\n                <a href=\"javascript:void(0)\" class=\"text-dark\"> Management </a>\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Audit Trails\n              </li>\n\t\t\t\t\t\t</ol>\n\t\t\t\t\t</nav>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Action Types</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    \n    <div class=\"row\">\n        <div class=\"col\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Audit Trails</h3>\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <div class=\"row\">\n                      <div class=\"col-sm-12 col-md-6\">\n                        <div class=\"dataTables_length\" id=\"datatable_length\">\n                          <label>\n                            Show\n                            <select\n                              name=\"datatable_length\"\n                              aria-controls=\"datatable\"\n                              class=\"form-control form-control-sm\"\n                              (change)=\"entriesChange($event)\"\n                            >\n                              <option value=\"10\" [selected]=\"entries==5\">5</option>\n                              <option value=\"25\" [selected]=\"entries==10\">10</option>\n                              <option value=\"50\" [selected]=\"entries==15\">15</option>\n                              <option value=\"-1\" [selected]=\"entries==-1\">All</option>\n                            </select>\n                            records\n                            </label>\n                        </div>\n                      </div>\n                      <div class=\"col-sm-12 col-md-6\">\n                        <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                          <label>\n                            <input\n                              type=\"search\"\n                              class=\"form-control form-control-sm\"\n                              placeholder=\"Search records\"\n                              aria-controls=\"datatable\"\n                              (keyup)=\"filterTable($event)\"\n                            />\n                          </label>\n                        </div>\n                      </div>\n                    </div>\n                \n                    <ngx-datatable\n                      class=\"bootstrap selection-cell\"\n                      [columnMode]=\"'force'\"\n                      [headerHeight]=\"50\"\n                      [footerHeight]=\"50\"\n                      [rowHeight]=\"'auto'\"\n                      [limit]=\"tableEntries != -1 ? tableEntries:undefined\"\n                      [rows]=\"tableTemp\"\n                      (activate)=\"onActivate($event)\"\n                    >\n                \n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>ID</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.staff_id}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Username\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Email\"></ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                              <span>Created At</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                              {{row.created_at}}\n                            </ng-template>\n                          </ngx-datatable-column>\n                          <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                              <span>Action</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <span *ngIf=\"row.action == 'POST'\" class=\"badge badge-pill badge-default\">POST</span>\n                                <span *ngIf=\"row.action == 'GET'\" class=\"badge badge-pill badge-success\">GET</span>\n                                <span *ngIf=\"row.action == 'UPDATE'\" class=\"badge badge-pill badge-info\">UPDATE</span>\n                                <span *ngIf=\"row.action == 'DELETE'\" class=\"badge badge-pill badge-warning\">DELETE</span>\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Description\"></ngx-datatable-column>\n                    </ngx-datatable>\n                  </div>\n            </div>\n        </div>\n    </div>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.html":
/*!***************************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.html ***!
  \***************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-8 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Kemas Kini Metadata</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Metadata\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kemas Kini Metadata\n                            </li>\n\n                        </ol>\n                    </nav>\n                </div>\n\n                <div class=\" col-lg-4 col-5 text-right\">\n                    <div class=\"btn-group\" dropdown>\n                        <button id=\"button-basic\" dropdownToggle type=\"button\"\n                            class=\"btn btn-primary btn-sm dropdown-toggle\" aria-controls=\"dropdown-basic\">\n                            Tambah <span class=\"caret\"></span>\n                        </button>\n                        <ul id=\"dropdown-basic\" *dropdownMenu class=\"dropdown-menu dropdown-menu-right\" role=\"menu\"\n                            aria-labelledby=\"button-basic\">\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addCategory)\">Kategori +</a>\n                            </li>\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addSubTitle)\">\n                                Tajuk +</a></li>\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addSubTitle)\">\n                                Sub-Tajuk +</a></li>\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addElement)\">Elemen +</a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Show\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    entries\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                                <label>\n                                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian..\"\n                                        aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\">\n\n                        <ngx-datatable-column name=\"Bil\" [width]=\"80\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Label\" [width]=\"100\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tajuk\" [width]=\"200\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Sub-Tajuk\" [width]=\"100\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.subtajuk}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Elemen\" [width]=\"100\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\" [width]=\"100\"></ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\" [width]=\"100\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a href=\"javascript:void(0)\"><i class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<!--Modal-->\n\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Kategori\" formControlName=\"category\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addTitle>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Tajuk\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Label</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Label\" formControlName=\"label\"\n                    type=\"text\">\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Tajuk</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Tajuk\" formControlName=\"title\"\n                    type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addSubTitle>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Sub-Tajuk\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Label</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Label\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Tajuk</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Tajuk\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Tajuk</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Sub-Tajuk\" formControlName=\"subtitle\"\n                    type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addElement>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Elemen\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Label</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Label\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Tajuk</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Tajuk\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Tajuk</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Sub-Tajuk\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Elemen</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Elemen\" formControlName=\"elemen\"\n                    type=\"text\">\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Data Type</label>\n                <select class=\"form-control py-0\" style=\"width: 50%;\">\n                    <option selected disabled hidden>Pilih Data Type\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-faq/management-faq.component.html":
/*!***************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-faq/management-faq.component.html ***!
  \***************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-8 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Konfigurasi Soalan Lazim</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-users text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Portal\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Soalan Lazim\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n                <div class=\"col-lg-4 col-5 text-right\">\n                    <a *ngIf=\"!editEnabled\" class=\"btn btn-default btn-sm text-white btn-icon btn-3\"\n                        (click)=\"toggleEdit()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Soalan</span>\n                    </a>\n                    <a *ngIf=\"!editEnabled\" class=\"btn btn-primary btn-sm text-white btn-icon btn-3\"\n                        (click)=\"openModal(addCategory)\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Kategori</span>\n                    </a>\n                    <a *ngIf=\"editEnabled\" class=\"btn btn-danger btn-sm text-white btn-icon btn-3\"\n                        (click)=\"toggleEdit()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n                        <span class=\"btn-inner--text\">Balik</span>\n                    </a>\n                    <a *ngIf=\"editEnabled\" class=\"btn btn-success btn-sm text-white btn-icon btn-3\"\n                        (click)=\"confirmSave()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-save\"></i></span>\n                        <span class=\"btn-inner--text\">Simpan</span>\n                    </a>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col-xl-7 order-xl-2\">\n            <div class=\"card\">\n                <div class=\"card-header bg-primary\">\n                    <h3 *ngIf=\"!editEnabled\" class=\"text-white mb-0\">Perincian Soalan dan Jawapan</h3>\n                    <h3 *ngIf=\"editEnabled\" class=\"text-white mb-0\">Tambah Soalan dan Jawapan</h3>\n                </div>\n                <div class=\"card-body\">\n                    <form>\n                        <div class=\"form-group\">\n                            <label class=\"form-control-label\">Kategori</label>\n                            <input class=\"form-control\" placeholder=\"\" formControlName=\"name\" type=\"text\">\n                        </div>\n                        <div class=\"form-group\">\n                            <label class=\"form-control-label\">Jawapan</label>\n                            <form>\n                                <quill-editor></quill-editor>\n                            </form>\n                        </div>\n                    </form>\n                </div>\n            </div>\n        </div>\n\n        <div class=\"col-xl-5 order-xl-1\">\n            <div class=\"card\">\n                <div class=\"card-header\">\n                    <div class=\"row align-items-center\">\n                        <div class=\"col-8\">\n                        </div>\n\n                        <div class=\"col-4 text-right\">\n                            <!--<a  *ngIf=\"!editEnabled\"  class=\"btn btn-sm btn-primary\" href=\"javascript:void(0)\">\n                                Settings\n                            </a>-->\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"card-body\">\n                    <h3 class=\"text-center\">Senarai Kategori</h3>\n                    <div class=\"container\">\n                        <select size=\"10\" style=\"overflow: hidden;\" class=\"form-control\">\n                            <option hidden selected>Pilih Kategori</option>\n                            <option>Metadata</option>\n                            <option>Data-data Asas</option>\n                        </select>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Kategori\" formControlName=\"category\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\">\n            Tambah\n        </button>\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Tutup\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-newapp/management-newapp.component.html":
/*!*********************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-newapp/management-newapp.component.html ***!
  \*********************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n  <div class=\" container-fluid\">\n    <div class=\" header-body\">\n      <div class=\" row align-items-center py-4\">\n        <div class=\" col-lg-9 col-7\">\n          <h6 class=\" h2 d-inline-block mb-0\">Permohonan Baru</h6>\n\n          <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n            <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n              <li class=\" breadcrumb-item\">\n                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Pengurusan Data Asas\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Permohonan Baru\n              </li>\n            </ol>\n          </nav>\n        </div>\n\n        <div class=\"col-lg-3 col-5 text-right\">\n          <a *ngIf=\"checkEnabled\" class=\"btn btn-default btn-sm text-white btn-icon btn-3\" (click)=\"displayCheck()\">\n            <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n            <span class=\"btn-inner--text\">Balik</span>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div *ngIf=\"!this.checkEnabled\" class=\" container-fluid mt--6\">\n  <div class=\" row\">\n    <div class=\" col\">\n      <div class=\" card\">\n        <div class=\" card-header\">\n          <div class=\"row mb-0\">\n            <div class=\"col-sm-12 col-md-6\">\n              <div class=\"dataTables_length\" id=\"datatable_length\">\n                <label>\n                  Papar\n                  <select name=\"datatable_length\" aria-controls=\"datatable\" class=\"form-control form-control-sm\"\n                    (change)=\"entriesChange($event)\">\n\n                    <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                    <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                    <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                    <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                    <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                  </select>\n                  rekod\n                </label>\n              </div>\n            </div>\n            <div class=\"col-sm-12 col-md-6\">\n              <!--<div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                      aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                  </label>\n                </div>-->\n            </div>\n          </div>\n\n        </div>\n        <div class=\"dataTables_wrapper py-4\">\n          <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\" [footerHeight]=\"50\"\n            [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n            (activate)=\"onActivate($event)\">\n\n            <ngx-datatable-column name=\"Bil\">\n              <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                {{rowIndex+1}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Nama Permohonan\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapermohonan}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Nama Pemohon\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapemohon}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Tarikh\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Tindakan\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                <a (click)=\"displayCheck()\" class=\"text-teal\">Semak</a>\n              </ng-template>\n            </ngx-datatable-column>\n\n          </ngx-datatable>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div *ngIf=\"this.checkEnabled\" class=\" container-fluid mt--6\">\n  <div class=\" row\">\n    <div class=\" col\">\n      <div class=\" card\">\n        <div class=\"card-body p-lg-4\">\n          <h6 class=\"heading-small text-muted mb-4\">Maklumat Pemohon</h6>\n          <div class=\"pl-lg-4\">\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Nama Penuh\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"Muhammad Abu bin Ali\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  No Kad Pengenalan\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                  value=\"890103085322\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Institusi\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"Universiti Sains Malaysia \" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-4\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Alamat\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                  value=\"Bahagian Pengurusan Maklumat\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\"col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Emel\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                  value=\"tarmizi@ketsa.com.my\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Telefon Pejabat\n                </label>\n              </div>\n              <div class=\" col-xl-3\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"043456789\" disabled />\n              </div>\n              <div class=\"col-xl-2 text-center\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Telefon Bimbit\n                </label>\n              </div>\n              <div class=\" col-xl-3\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"0173456789\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Peranan\n                </label>\n              </div>\n              <div class=\" col-xl-3\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"Pemohon Data\" disabled />\n              </div>\n              <div class=\"col-xl-2 text-center\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Kategori\n                </label>\n              </div>\n              <div class=\" col-xl-3\">\n                <input class=\"form-control form-control-sm \" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                  value=\"IPTA - Pelajar\" disabled />\n              </div>\n            </div>\n          </div>\n\n          <hr class=\"my-4\" />\n\n          <h6 class=\"heading-small text-muted my-4\">Maklumat Permohonan</h6>\n          <div class=\"pl-lg-4\">\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-nameapp\">\n                  Nama Permohonan\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-nameapp\" placeholder=\"Name\" type=\"text\"\n                  value=\"Permohonan Data Sungai Selangor\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Tarikh Permohonan\n                </label>\n              </div>\n              <div class=\" col-xl-3\">\n                <input class=\"form-control form-control-sm \" id=\"input-dateapp\" placeholder=\"Name\" type=\"text\"\n                  value=\"13/10/2020\" disabled />\n              </div>\n            </div>\n            <div class=\"row mb-2\">\n              <div class=\" col-xl-2\">\n                <label class=\"form-control-label\" for=\"input-username\">\n                  Tujuan Permohonan\n                </label>\n              </div>\n              <div class=\"col-xl-8\">\n                <input class=\"form-control form-control-sm \" id=\"input-purposeapp\" placeholder=\"Name\" type=\"text\"\n                  value=\"For research purpose\" disabled />\n              </div>\n            </div>\n          </div>\n\n          <hr class=\"my-4\" />\n\n          <h6 class=\"heading text-dark\">Senarai Data dan Kawasan Data</h6>\n          <div class=\"dataTables_wrapper py-4\">\n            <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n              [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n              (activate)=\"onActivate($event)\">\n\n              <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n                <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                  {{rowIndex+1}}\n                </ng-template>\n              </ngx-datatable-column>\n              <ngx-datatable-column name=\"Lapisan Data\" [width]=\"400\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Sub-Kategori\" [width]=\"200\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Kategori\" [width]=\"200\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Kawasan Data\" [width]=\"200\"></ngx-datatable-column>\n            </ngx-datatable>\n          </div>\n\n          <hr class=\"my-4\" />\n\n          <h6 class=\"heading text-dark\">Dokumen Berkaitan</h6>\n          <div class=\"dataTables_wrapper py-4\">\n            <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n              [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n              (activate)=\"onActivate($event)\">\n\n              <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n                <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                  {{rowIndex+1}}\n                </ng-template>\n              </ngx-datatable-column>\n              <ngx-datatable-column name=\"Tajuk Dokumen\" [width]=\"400\"></ngx-datatable-column>\n              <ngx-datatable-column name=\"Nama Fail\" [width]=\"200\"></ngx-datatable-column>\n            </ngx-datatable>\n          </div>\n\n          <hr class=\"my-4\" />\n\n          <div class=\"form-inline\">\n            <h3 class=\"text-dark mr-3\">AKUAN PELAJAR</h3>\n            <a class=\"btn btn-warning btn-sm text-white btn-icon btn-3\" (click)=\"displayCheck()\">\n              <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-right\"></i></span>\n              <span class=\"btn-inner--text\">Papar</span>\n            </a>\n          </div>\n          <div class=\"row\">\n            <div class=\"col-xl-4\">\n              <h6 class=\"heading text-dark mt-4\">Status Permohonan</h6>\n              <select class=\" form-control form-control-sm mb-4\" id=\"input-agensi\">\n                <option selected disabled hidden> Pilih Status </option>\n                <option value=\"1\">Option 1</option>\n                <option value=\"2\">Option 2</option>\n              </select>\n              <h6 class=\"heading text-dark mt-4\">Catatan Permohonan</h6>\n              <select class=\" form-control form-control-sm mb-4\" id=\"input-agensi\">\n                <option selected disabled hidden> Catatan </option>\n                <option value=\"1\">Option 1</option>\n                <option value=\"2\">Option 2</option>\n              </select>\n            </div>\n          </div>\n\n          <hr class=\"my-4\" />\n\n          <div class=\"text-right\">\n            <a class=\"btn btn-danger text-white btn-icon btn-3\" (click)=\"toggleEdit()\">\n              <span class=\"btn-inner--icon\"><i class=\"fa fa-paper-plane\"></i></span>\n              <span class=\"btn-inner--text\">Hantar</span>\n            </a>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-processdata/management-processdata.component.html":
/*!*******************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-processdata/management-processdata.component.html ***!
  \*******************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n  <div class=\" container-fluid\">\n    <div class=\" header-body\">\n      <div class=\" row align-items-center py-4\">\n        <div class=\" col-lg-6 col-7\">\n          <h6 class=\" h2 d-inline-block mb-0\">Proses Data</h6>\n\n          <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n            <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n              <li class=\" breadcrumb-item\">\n                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n              </li>\n\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Pengurusan Data Asas\n              </li>\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Proses Data\n              </li>\n\n            </ol>\n          </nav>\n        </div>\n\n        <div class=\" col-lg-6 col-5 text-right\">\n          <!--\n              <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n             -->\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n  <div class=\" row\">\n    <div class=\" col\">\n      <div class=\" card\">\n        <div class=\" card-header\">\n          <div class=\"row mb-0\">\n            <div class=\"col-sm-12 col-md-6\">\n              <div class=\"dataTables_length\" id=\"datatable_length\">\n                <label>\n                  Papar\n                  <select name=\"datatable_length\" aria-controls=\"datatable\" class=\"form-control form-control-sm\"\n                    (change)=\"entriesChange($event)\">\n\n                    <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                    <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                    <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                    <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                    <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                  </select>\n                  rekod\n                </label>\n              </div>\n            </div>\n            <div class=\"col-sm-12 col-md-6\">\n              <!-- <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                <label>\n                  <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                    aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                </label>\n              </div> -->\n            </div>\n          </div>\n\n        </div>\n        <div class=\"dataTables_wrapper py-4\">\n          <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\" [footerHeight]=\"50\"\n            [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n            (activate)=\"onActivate($event)\">\n\n            <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n              <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                {{rowIndex+1}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column>\n              <ng-template ngx-datatable-header-template>\n                <span>Nama Permohonan</span>\n              </ng-template>\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapermohonan}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column>\n              <ng-template ngx-datatable-header-template>\n                <span>Nama Pemohon</span>\n              </ng-template>\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapemohon}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Tindakan\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                <a class=\"text-green\" (click)=\"openModal(startTask)\"><i class=\"fas fa-file-export mr-3\"></i></a>\n                <a href=\"javascript:void(0)\"><i class=\"fas fa-edit mr-3\"></i></a>\n              </ng-template>\n            </ngx-datatable-column>\n\n          </ngx-datatable>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<ng-template #startTask>\n  <div class=\"modal-header bg-default\">\n    <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n      Proses Data\n    </h6>\n\n    <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n      <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n    </button>\n  </div>\n\n  <div class=\"modal-body\">\n    <form>\n      <h6 class=\"heading text-dark\">Senarai Data Yang Dipohon</h6>\n      <div class=\"dataTables_wrapper py-4\">\n        <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\" [footerHeight]=\"50\"\n          [rowHeight]=\"'auto'\" [limit]=\"entries2 != -1 ? entries2 : undefined\" [rows]=\"temp\"\n          (activate)=\"onActivate($event)\">\n\n          <ngx-datatable-column name=\"Bil\">\n            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n              {{rowIndex+1}}\n            </ng-template>\n          </ngx-datatable-column>\n          <ngx-datatable-column name=\"Lapisan Data\"></ngx-datatable-column>\n          <ngx-datatable-column name=\"Sub-Kategori\"></ngx-datatable-column>\n          <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n          <ngx-datatable-column name=\"Kawasan Data\"></ngx-datatable-column>\n          <ngx-datatable-column name=\"Saiz × Harga\">\n            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n              <div class=\"form-inline\">\n                <input class=\"form-control form-control-sm\" placeholder=\"Saiz\" style=\"width: 90px;\" type=\"text\">\n                <label class=\"ml-2\">× RM40</label>\n              </div>\n\n            </ng-template>\n          </ngx-datatable-column>\n\n        </ngx-datatable>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-xl-12\">\n          <div class=\"form-inline float-right\">\n            <label class=\"form-control-label mr-2\">Jumlah Harga</label>\n            <input class=\"form-control form-control-sm\" placeholder=\"RM0.00\" style=\"width: 90px;\" type=\"text\" disabled>\n          </div>\n        </div>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-xl-6\">\n          <div class=\"form-group\">\n            <label class=\"form-control-label mr-2\">Pautan Data </label>\n            <input class=\"form-control form-control-sm mb-2\" placeholder=\"\" type=\"text\">\n\n            <label class=\"form-control-label mr-2\">Tempoh Muat Turun </label>\n            <input class=\"form-control form-control-sm\" placeholder=\"\" type=\"text\">\n          </div>\n          <div class=\"form-inline\">\n            <label class=\"form-control-label mr-2\">Surat Balasan Permohonan </label>\n            <button class=\"btn btn-sm btn-danger mb-2\" type=\"button\" (click)=\"confirm()\">\n              Kemaskini\n            </button>\n          </div>\n        </div>\n        <div class=\"col-xl-6 pt-9 text-right\">\n          <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Hantar\n          </button>\n        </div>\n      </div>\n    </form>\n  </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-category/class-category.component.html":
/*!*************************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-category/class-category.component.html ***!
  \*************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-12 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Kategori Pengkelasan Data</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Data Asas\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kemas Kini Data\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kategori Pengkelasan Data\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n\n                <!-- <div class=\" col-lg-4 col-5 text-right\">\n\n                </div> -->\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                                <label>\n                                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian data\"\n                                        aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\" [scrollbarH]=\"true\">\n\n                        <ngx-datatable-column name=\"Bil\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.category}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Sub-kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.subcategory}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Lapisan Data\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.datalayer}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kelas\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.class}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a class=\"text-success\" (click)=\"openModal(editData)\"><i\n                                        class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Kategori\" formControlName=\"category\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addSubCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Sub-Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Sub-Kategori\" formControlName=\"subcategory\"\n                    type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addLayer>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Lapisan\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Sub-Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Lapisan</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Lapisan\" formControlName=\"layer\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #editData>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Kemas Kini Data\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Kategori</label>\n                <input class=\"form-control\" value=\"Aeronautical\" formControlName=\"layer\" typ=\"text\" disabled>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Sub-Kategori</label>\n                <input class=\"form-control\" value=\"Lapangan Terbang (Aerodrome-AB)\" type=\"text\" disabled>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Lapisan Data</label>\n                <input class=\"form-control\" value=\"Transitional Surface\" type=\"text\" disabled>\n            </div>\n            <div class=\"form-inline\">\n                <label class=\"form-control-label mr-3\">Kelas</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kelas\n                    </option>\n                    <option value=\"1\">Terhad</option>\n                    <option value=\"2\">Tidak Terhad</option>\n                </select>\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.html":
/*!***********************************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.html ***!
  \***********************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-12 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Kategori Pengkelasan Perkongsiaan Data</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Data Asas\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kemas Kini Data\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kategori Pengkelasan Perkongsian Data\n                            </li>\n\n                        </ol>\n                    </nav>\n                </div>\n\n                <!-- <div class=\" col-lg-0 col-5 text-right\">\n                    \n                <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n               \n                </div> -->\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <!-- <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                      aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                  </label>\n                </div> -->\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\" [scrollbarH]=\"true\">\n\n                        <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.category}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Sub Kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.subcategory}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Status\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a *ngIf=\"row.status == 'Aktif'\" class=\"badge badge-pill badge-success\">Aktif</a>\n                                <a *ngIf=\"row.status == 'Tidak Aktif'\" class=\"badge badge-pill badge-danger\">Tidak Aktif</a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a class=\"text-success\" (click)=\"openModal(editData)\"><i class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/datalist/datalist.component.html":
/*!*************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/datalist/datalist.component.html ***!
  \*************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-8 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Senarai Data</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Data Asas\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kemas Kini Data\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Senarai Data\n                            </li>\n\n                        </ol>\n                    </nav>\n                </div>\n\n                <div class=\" col-lg-4 col-5 text-right\">\n                    <div class=\"btn-group\" dropdown>\n                        <button id=\"button-basic\" dropdownToggle type=\"button\"\n                            class=\"btn btn-primary btn-sm dropdown-toggle\" aria-controls=\"dropdown-basic\">\n                            Tambah <span class=\"caret\"></span>\n                        </button>\n                        <ul id=\"dropdown-basic\" *dropdownMenu class=\"dropdown-menu dropdown-menu-right\" role=\"menu\"\n                            aria-labelledby=\"button-basic\">\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addCategory)\">Kategori +</a>\n                            </li>\n                            <li role=\"menuitem\"><a class=\"dropdown-item\"\n                                    (click)=\"openModal(addSubCategory)\">Sub-Kategori +</a></li>\n                            <li role=\"menuitem\"><a class=\"dropdown-item\" (click)=\"openModal(addLayer)\">Lapisan +</a>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                                <label>\n                                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian data\"\n                                        aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\" [scrollbarH]=\"false\">\n\n                        <ngx-datatable-column name=\"Bil\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.category}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Sub-kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.subcategory}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Lapisan Data\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.datalayer}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a href=\"javascript:void(0)\"><i class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Kategori\" formControlName=\"category\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addSubCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Sub-Kategori\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Kategori</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Sub-Kategori\" formControlName=\"subcategory\"\n                    type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>\n\n<ng-template #addLayer>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Lapisan\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Sub-Kategori</label>\n                <select class=\"form-control py-0\">\n                    <option selected disabled hidden>Pilih Sub-Kategori\n                    </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Lapisan</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Lapisan\" formControlName=\"layer\" type=\"text\">\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success ml-auto\" type=\"button\" (click)=\"confirm()\">\n            Simpan\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/dataprice/dataprice.component.html":
/*!***************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/dataprice/dataprice.component.html ***!
  \***************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n    <div class=\" container-fluid\">\n        <div class=\" header-body\">\n            <div class=\" row align-items-center py-4\">\n                <div class=\" col-lg-8 col-7\">\n                    <h6 class=\" h2 d-inline-block mb-0\">Harga Data</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n                        <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Data Asas\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Kemas Kini Data\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Harga Data\n                            </li>\n\n                        </ol>\n                    </nav>\n                </div>\n\n                <div class=\" col-lg-4 col-5 text-right\">\n                    <!--\n                <a class=\" btn btn-sm btn-neutral\" href=\"javascript:void(0)\"> New </a>\n               -->\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n    <div class=\" row\">\n        <div class=\" col\">\n            <div class=\" card\">\n                <div class=\" card-header\">\n                    <div class=\"row mb-0\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n\n                                        <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                                        <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                                        <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                                        <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                                        <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <!-- <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                      aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                  </label>\n                </div> -->\n                        </div>\n                    </div>\n\n                </div>\n                <div class=\"dataTables_wrapper py-4\">\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                        [rows]=\"temp\" (activate)=\"onActivate($event)\">\n\n                        <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.category}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Sub-kategori\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.subcategory}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Lapisan Data\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.datalayer}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Harga Data (1MB)\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.price_permb}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Tindakan\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <a href=\"javascript:void(0)\"><i class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteData()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n\n                    </ngx-datatable>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-user/management-user.component.html":
/*!*****************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-user/management-user.component.html ***!
  \*****************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-6 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Pengurusan Pengguna</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-user-cog text-dark\"></i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Pengguna\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n\n                <div class=\"col-lg-6 col-5 text-right\">\n                    <a *ngIf=\"!transEnabled\" class=\"btn btn-sm btn-default text-white\" (click)=\"toggleChange()\">\n                        Pemindahan Akaun\n                    </a>\n                    <a *ngIf=\"transEnabled\" class=\"btn btn-sm btn-danger text-white\" (click)=\"toggleChange()\">\n                        Back\n                    </a>\n                    <a class=\"btn btn-sm btn-success text-white\" (click)=\"openModal(createUser)\">\n                        <i class=\"fas fa-plus\"></i>\n                        Pengguna Baru\n                    </a>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <!--<div class=\"row\">\n        <div class=\"col\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Registered User by Month</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div> -->\n\n    <div class=\"row\">\n        <div class=\"col\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 *ngIf=\"!transEnabled\" class=\"m-0\">Senarai Pengguna</h3>\n                    <h3 *ngIf=\"transEnabled\" class=\"m-0\">Pemindahan Akaun</h3>\n                </div>\n                <div *ngIf=\"!transEnabled\" class=\"dataTables_wrapper py-4\">\n                    <div class=\"row\">\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div class=\"dataTables_length\" id=\"datatable_length\">\n                                <label>\n                                    Papar\n                                    <select name=\"datatable_length\" aria-controls=\"datatable\"\n                                        class=\"form-control form-control-sm\" (change)=\"entriesChange($event)\">\n                                        <option value=\"5\" [selected]=\"tableEntries==5\">5</option>\n                                        <option value=\"10\" [selected]=\"tableEntries==10\">10</option>\n                                        <option value=\"15\" [selected]=\"tableEntries==15\">15</option>\n                                        <option value=\"-1\" [selected]=\"tableEntries==-1\">All</option>\n                                    </select>\n                                    rekod\n                                </label>\n                            </div>\n                        </div>\n                        <div class=\"col-sm-12 col-md-6\">\n                            <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                                <label>\n                                    <input type=\"search\" class=\"form-control form-control-sm\"\n                                        placeholder=\"Search records\" aria-controls=\"datatable\"\n                                        (keyup)=\"filterTable($event)\" />\n                                </label>\n                            </div>\n                        </div>\n                    </div>\n\n                    <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                        [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"tableEntries != -1 ? tableEntries:undefined\"\n                        [rows]=\"tableTemp\" (activate)=\"onActivate($event)\">\n\n                        <ngx-datatable-column name=\"Bil\" [width]=\"80\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                {{rowIndex+1}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column name=\"Nama Pengguna\">\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.name}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>Nama Agensi</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.agency_name}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>Peranan</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                {{row.user_type}}\n                            </ng-template>\n                        </ngx-datatable-column>\n                        <ngx-datatable-column>\n                            <ng-template ngx-datatable-header-template>\n                                <span>Tindakan</span>\n                            </ng-template>\n                            <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                                <!--<a *ngIf=\"row.is_active == 'Active'\" class=\"badge badge-pill badge-success\">Active</a>\n                                <a *ngIf=\"row.is_active == 'Inactive'\" class=\"badge badge-pill badge-warning\">Inactive</a> -->\n                                <a class=\"text-green\" (click)=\"openModal(displayUser)\"><i\n                                        class=\"fas fa-eye mr-3\"></i></a>\n                                <a href=\"javascript:void()\"><i class=\"fas fa-edit mr-3\"></i></a>\n                                <a class=\"text-warning\" (click)=\"deleteUser()\"><i class=\"fas fa-trash-alt\"></i></a>\n                            </ng-template>\n                        </ngx-datatable-column>\n                    </ngx-datatable>\n                </div>\n                <div *ngIf=\"transEnabled\" class=\"card-body px-lg-4\">\n                    <div class=\"form-group\">\n                        <div class=\"row mb-2\">\n                            <div class=\"col-2\">\n                                <label class=\"form-control-label mr-4\" for=\"input-sektor\">\n                                    Pilih Agensi\n                                </label>\n                            </div>\n                            <div class=\"col-5\">\n                                <select class=\"form-control form-control-sm ml-3\" id=\"input-bahagian\">\n                                    <option selected disabled hidden> Nama Agensi/Organisasi </option>\n                                    <option value=\"penerbit\">Kerajaan</option>\n                                    <option value=\"pengesah\">Swasta</option>\n                                </select>\n                            </div>\n                        </div>\n                        <div class=\"row mb-2\">\n                            <div class=\"col-2\">\n                                <label class=\"form-control-label mr-4\" for=\"input-sektor\">\n                                    Pilih Penguna\n                                </label>\n                            </div>\n                            <div class=\"col-4\">\n                                <select class=\"form-control form-control-sm ml-3\" id=\"input-bahagian\">\n                                    <option selected disabled hidden> Pilih Pengguna </option>\n                                    <option value=\"penerbit\">Kerajaan</option>\n                                    <option value=\"pengesah\">Swasta</option>\n                                </select>\n                            </div>\n                        </div>\n                        <div class=\"row mb-2\">\n                            <div class=\"col-2\">\n                                <label class=\"form-control-label mr-4\" for=\"input-sektor\">\n                                    Penguna Baru\n                                </label>\n                            </div>\n                            <div class=\"col-4\">\n                                <select class=\"form-control form-control-sm ml-3\" id=\"input-bahagian\">\n                                    <option selected disabled hidden> Pilih Jenis Akaun Pengguna </option>\n                                    <option value=\"penerbit\">Kerajaan</option>\n                                    <option value=\"pengesah\">Swasta</option>\n                                </select>\n                            </div>\n                        </div>\n                    </div>\n                    <div class=\"card-title\">\n                        <h3 class=\"upcase mt-4\">Senarai Metadata Dibawah Pengguna</h3>\n                    </div>\n                    <div class=\"dataTables_wrapper py-4\">\n                        <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\"\n                            [footerHeight]=\"50\" [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\"\n                            [rows]=\"temp\" (activate)=\"onActivate($event)\">\n\n                            <ngx-datatable-column name=\"Bil\" [width]=\"80\">\n                                <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                                    {{rowIndex+1}}\n                                </ng-template>\n                            </ngx-datatable-column>\n                            <ngx-datatable-column name=\"Nama Metadata\" [width]=\"300\"></ngx-datatable-column>\n                            <ngx-datatable-column name=\"Kategori\" [width]=\"100\"></ngx-datatable-column>\n                            <ngx-datatable-column name=\"Status\" [width]=\"100\"></ngx-datatable-column>\n                        </ngx-datatable>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #createUser>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Pengguna Baru\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form [formGroup]=\"registerForm\">\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Penuh</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Nama\" formControlName=\"name\" type=\"text\">\n                <ng-container *ngFor=\"let message of registerFormMessages.name\">\n                    <div\n                        *ngIf=\"registerForm.get('name').hasError(message.type) && (registerForm.get('name').dirty || registerForm.get('name').touched)\">\n                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                    </div>\n                </ng-container>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Peranan</label>\n                <select class=\"form-control custom-select py-0\" id=\"input-peranan\">\n                    <option selected disabled hidden class=\"text-muted\">Pilih Peranan </option>\n                    <option value=\"1\">Option 1</option>\n                    <option value=\"2\">Option 2</option>\n                    <option value=\"admin\">Admin</option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Emel</label>\n                <input class=\"form-control\" placeholder=\"Masukkan Emel\" formControlName=\"email\" type=\"text\">\n                <ng-container *ngFor=\"let message of registerFormMessages.email\">\n                    <div\n                        *ngIf=\"registerForm.get('email').hasError(message.type) && (registerForm.get('email').dirty || registerForm.get('email').touched)\">\n                        <p class=\"error-message\"><span>{{ message.message }}</span></p>\n                    </div>\n                </ng-container>\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button class=\"btn btn-success\" type=\"button\" (click)=\"confirm()\" [disabled]=\"!registerForm.valid\">\n            Tambah\n        </button>\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Tutup\n        </button>\n    </div>\n</ng-template>\n\n<!--Display Maklumat Pengguna-->\n\n<ng-template #displayUser>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Maklumat Pengguna\n        </h6>\n\n        <button aria-label=\"Close\" class=\"close\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Nama Penuh\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                        value=\"Tarmizi bin Ahmad\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        No Kad Pengenalan\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                        value=\"890103085322\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Agensi/Organisasi\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                        value=\"Kementerian Tenaga dan Sumber Asli \" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Bahagian\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                        value=\"Bahagian Pengurusan Maklumat\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Sektor\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                        value=\"Kerajaan\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Emel\n                    </label>\n                </div>\n                <div class=\"col-8\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                        value=\"tarmizi@ketsa.com.my\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Telefon Pejabat\n                    </label>\n                </div>\n                <div class=\"col-5\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                        value=\"043456789\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Telefon Bimbit\n                    </label>\n                </div>\n                <div class=\"col-5\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                        value=\"0173456789\" disabled />\n                </div>\n            </div>\n            <div class=\"row mb-2\">\n                <div class=\"col-3\">\n                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                        Peranan\n                    </label>\n                </div>\n                <div class=\"col-5\">\n                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\" type=\"text\"\n                        value=\"Penerbit Metadata\" disabled />\n                </div>\n            </div>\n        </form>\n    </div>\n    <div class=\"modal-footer\">\n\n        <button class=\"btn btn-outline-danger ml-auto\" data-dismiss=\"modal\" type=\"button\" (click)=\"closeModal()\">\n            Close\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-userguide/management-userguide.component.html":
/*!***************************************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-userguide/management-userguide.component.html ***!
  \***************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-9 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Kongfigurasi Panduan Pengguna</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-users text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Pengurusan Portal\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Panduan Pengguna\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n                <div class=\"col-lg-3 col-5 text-right\">\n                    <a \n                        *ngIf=\"!editEnabled\"\n                        class=\"btn btn-default btn-sm text-white btn-icon btn-3\" \n                        (click)=\"toggleEdit()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Panduan Pengguna</span>\n                    </a>\n                    <a \n                        *ngIf=\"!editEnabled\"\n                        class=\"btn btn-primary btn-sm text-white btn-icon btn-3\" \n                        (click)=\"openModal(addCategory)\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-plus\"></i></span>\n                        <span class=\"btn-inner--text\">Kategori</span>\n                    </a>\n                    <a\n                        *ngIf=\"editEnabled\"\n                        class=\"btn btn-danger btn-sm text-white btn-icon btn-3\" \n                        (click)=\"toggleEdit()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n                        <span class=\"btn-inner--text\">Balik</span>\n                    </a>\n                    <a \n                        *ngIf=\"editEnabled\"\n                        class=\"btn btn-success btn-sm text-white btn-icon btn-3\" \n                        (click)=\"confirmSave()\"> \n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-save\"></i></span>\n                        <span class=\"btn-inner--text\">Simpan</span>\n                    </a>\n\t\t\t\t</div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col-xl-7 order-xl-2\">\n        <div class=\"card\">\n            <div class=\"card-header bg-primary\">\n                <h3 *ngIf=\"!editEnabled\" class=\"text-white mb-0\">Perincian Panduan Pengguna</h3>\n                <h3 *ngIf=\"editEnabled\" class=\"text-white mb-0\">Tambah Panduan Pengguna</h3>\n            </div>\n            <div class=\"card-body\">\n                <form>\n                    <div *ngIf=\"editEnabled\" class=\"form-group\">\n                        <label class=\"form-control-label mr-4\">Kategori</label>\n                        <select class=\"form-control custom-select py-0\">\n                            <option hidden selected>Pilih Kategori</option>\n                            <option>Dataset</option>\n                            <option>Services</option>\n                            <option>Imagery</option>\n                            <option>Gridded</option>\n                        </select>\n                    </div>\n                    <div class=\"form-group\">\n                        <label class=\"form-control-label\">Tajuk</label>\n                        <input \n                          class=\"form-control\"\n                          formControlName=\"name\"\n                          type=\"text\"\n                        >\n                    </div>\n                    <div class=\"form-group\">\n                        <label class=\"form-control-label\">Kandungan</label>\n                        <form><quill-editor></quill-editor></form>\n                    </div>\n                </form>\n            </div>\n        </div>\n        </div>\n\n        <div class=\"col-xl-5 order-xl-1\">\n            <div class=\"card\">\n                <div class=\"card-header\">\n                    <div class=\"row align-items-center\">\n                        <div class=\"col-8\">\n                            <div class=\"form-inline\">\n                                <label class=\"form-control-label mr-4\">Kategori</label>\n                                <select class=\"form-control custom-select py-0\">\n                                    <option hidden selected>Pilih Kategori</option>\n                                    <option>Dataset</option>\n                                    <option>Services</option>\n                                    <option>Imagery</option>\n                                    <option>Gridded</option>\n                                </select>\n                            </div>\n                        </div>\n\n                        <div class=\"col-4 text-right\">\n                            <!--<a  *ngIf=\"!editEnabled\"  class=\"btn btn-sm btn-primary\" href=\"javascript:void(0)\">\n                                Settings\n                            </a>-->\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"card-body\">\n                    <h3 class=\"text-center\">Senarai Panduan Pengguna</h3>\n                    <div class=\"dataTables_wrapper py-4\">\n                        <ngx-datatable\n                            class=\"bootstrap selection-cell\"\n                            [columnMode]=\"'force'\"\n                            [headerHeight]=\"50\"\n                            [footerHeight]=\"50\"\n                            [rowHeight]=\"'auto'\"\n                            [limit]=\"entries != -1 ? entries : undefined\"\n                            [rows]=\"temp\"\n                            [selected]=\"selected\"\n                            [selectionType]=\"'single'\"\n                            (activate)=\"onActivate($event)\"\n                            \n                            >\n                          <ngx-datatable-column name=\"No\" [width]=\"100\">\n                            <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                              {{rowIndex+1}}\n                            </ng-template>\n                          </ngx-datatable-column>\n                          <ngx-datatable-column name=\"Tajuk\" [width]=\"300\"></ngx-datatable-column>\n                          \n                          \n                        </ngx-datatable>\n                      </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<ng-template #addCategory>\n    <div class=\"modal-header bg-default\">\n        <h6 class=\"modal-title text-white my-auto\" id=\"modal-title-default\">\n            Tambah Kategori\n        </h6>\n\n        <button\n            aria-label=\"Close\"\n            class=\"close\"\n            data-dismiss=\"modal\"\n            type=\"button\"\n            (click)=\"closeModal()\"\n        >\n            <span aria-hidden=\"true\" class=\"text-white my-auto\"> × </span>\n        </button>\n    </div>\n\n    <div class=\"modal-body\">\n        <form>\n            <div class=\"form-group\">\n                <label class=\"form-control-label\">Nama Kategori</label>\n                <input \n                  class=\"form-control\"\n                  placeholder=\"Masukkan Kategori\"\n                  formControlName=\"category\"\n                  type=\"text\"\n                >\n            </div>\n        </form>\n    </div>\n\n    <div class=\"modal-footer\">\n        <button \n            class=\"btn btn-success\"\n            type=\"button\"\n            (click)=\"confirm()\"\n        >\n            Tambah\n        </button>\n\n        <button\n            class=\"btn btn-outline-danger ml-auto\"\n            data-dismiss=\"modal\"\n            type=\"button\"\n            (click)=\"closeModal()\"\n        >\n            Tutup\n        </button>\n    </div>\n</ng-template>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/profile/profile.component.html":
/*!*************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/profile/profile.component.html ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-6 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Profil</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-users text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Profil Pengguna\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n                <div class=\"col-lg-6 col-5 text-right\">\n                    <a *ngIf=\"!editEnabled\" class=\"btn btn-default btn-sm text-white btn-icon btn-3\"\n                        (click)=\"toggleEdit()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-user-edit\"></i></span>\n                        <span class=\"btn-inner--text\">Kemaskini profil</span>\n                    </a>\n                    <a *ngIf=\"editEnabled\" class=\"btn btn-danger btn-sm text-white btn-icon btn-3\"\n                        (click)=\"toggleEdit()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n                        <span class=\"btn-inner--text\">Balik</span>\n                    </a>\n                    <a *ngIf=\"editEnabled\" class=\"btn btn-success btn-sm text-white btn-icon btn-3\"\n                        (click)=\"confirmSave()\">\n                        <span class=\"btn-inner--icon\"><i class=\"fas fa-save\"></i></span>\n                        <span class=\"btn-inner--text\">Simpan</span>\n                    </a>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col-xl-2 order-xl-2\">\n            <!-- <div class=\"card card-profile\">\n                <img alt=\"Image placeholder\" class=\"card-img-top\" src=\"assets/img/theme/img-1-1000x600.jpg\" />\n\n                <div class=\"row justify-content-center\">\n                    <div class=\"col-lg-3 order-lg-2\">\n                        <div class=\"card-profile-image\">\n                            <a>\n                                <img class=\"rounded-circle\" src=\"assets/img/default/avatar.png\" />\n                            </a>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4\">\n                    <div class=\"d-flex justify-content-between\">\n                        <a class=\"btn btn-sm btn-info mr-4\" href=\"javascript:void(0)\">\n                            Connect\n                        </a>\n\n                        <a class=\"btn btn-sm btn-default float-right\" href=\"javascript:void(0)\">\n                            Message\n                        </a>\n                    </div>\n                </div>\n\n                <div class=\"card-body pt-0\">\n                    <div class=\"row\">\n                        <div class=\"col\">\n                            <div class=\"card-profile-stats d-flex justify-content-center\">\n                                <div>\n                                    <span class=\"heading\"> 22 </span>\n\n                                    <span class=\"description\"> Friends </span>\n                                </div>\n\n                                <div>\n                                    <span class=\"heading\"> 10 </span>\n\n                                    <span class=\"description\"> Photos </span>\n                                </div>\n\n                                <div>\n                                    <span class=\"heading\"> 89 </span>\n\n                                    <span class=\"description\"> Comments </span>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n\n                    <div class=\"text-center\">\n                        <h5 class=\"h3\">\n                            Ali Imran<span class=\" font-weight-light\"> , 27 </span>\n                        </h5>\n\n                        <div class=\"h5 font-weight-300\">\n                            <i class=\"fas fa-location-arrow mr-2\"> </i> Ampang, Kuala Lumpur\n                        </div>\n\n                        <div class=\"h5 mt-4\">\n                            <i class=\"fas fa-briefcase mr-2\"> </i> IT Manager\n                        </div>\n                    </div>\n                </div>\n            </div> -->\n        </div>\n\n        <div class=\"col-xl-12 order-xl-1\">\n            <div class=\"card\">\n                <div class=\"card-header\">\n                    <div class=\"row align-items-center\">\n                        <div class=\"col-8\">\n                            <h3 *ngIf=\"!editEnabled\" class=\"mb-0\">Profil Pengguna</h3>\n                            <h3 *ngIf=\"editEnabled\" class=\"mb-0\"> Kemaskini Profil </h3>\n                        </div>\n\n                        <div class=\"col-4 text-right\">\n                            <!--<a  *ngIf=\"!editEnabled\"  class=\"btn btn-sm btn-primary\" href=\"javascript:void(0)\">\n                                Settings\n                            </a>-->\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"card-body\">\n                    <form *ngIf=\"!editEnabled\">\n                        <h6 class=\"heading-small text-muted mb-4\">Maklumat Pengguna</h6>\n                        <div class=\"pl-lg-4\">\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Nama Penuh\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input *ngIf=\"auth == 1\" class=\"form-control form-control-sm ml-3\"\n                                        id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                                        value=\"Misbun bin Muhammad Saad\" disabled />\n                                    <input *ngIf=\"auth == 2\" class=\"form-control form-control-sm ml-3\"\n                                        id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                                        value=\"Muhammad Faiz bin Amir\" disabled />\n                                    <input *ngIf=\"auth == 3\" class=\"form-control form-control-sm ml-3\"\n                                        id=\"input-username\" placeholder=\"Name\" type=\"text\"\n                                        value=\"Aina Hasrita binti Che Samsul\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        No Kad Pengenalan\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\"\n                                        type=\"text\" value=\"890103085322\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Agensi/Organisasi\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"Kementerian Tenaga dan Sumber Asli \"\n                                        disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Bahagian\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\"\n                                        type=\"text\" value=\"Bahagian Pengurusan Maklumat\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Sektor\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"Kerajaan\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Emel\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\"\n                                        type=\"text\" value=\"tarmizi@ketsa.com.my\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Telefon Pejabat\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-3\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"043456789\" disabled />\n                                </div>\n                                <div class=\"col-2\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Telefon Bimbit\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-3\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"0173456789\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Peranan\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input *ngIf=\"auth == 1\" class=\"form-control form-control-sm ml-3\" id=\"input-role\"\n                                        placeholder=\"Peranan\" type=\"text\" value=\"Pentadbir Aplikasi\" disabled />\n                                    <input *ngIf=\"auth == 2\" class=\"form-control form-control-sm ml-3\" id=\"input-role\"\n                                        placeholder=\"Peranan\" type=\"text\" value=\"Pentadbir Metadata\" disabled />\n                                    <input *ngIf=\"auth == 3\" class=\"form-control form-control-sm ml-3\" id=\"input-role\"\n                                        placeholder=\"Peranan\" type=\"text\" value=\"Pentadbir Data\" disabled />\n                                </div>\n                            </div>\n                        </div>\n\n                        <hr class=\"my-4\" />\n\n                        <h6 class=\"heading-small text-muted mb-4\">Gambar Profil</h6>\n\n                        <div class=\"pl-lg-4\">\n                            <div class=\"row\">\n                                <div class=\"col-3\">\n                                    <a>\n                                        <img class=\"rounded-circle\" style=\"width: 60%;\"\n                                            src=\"assets/img/default/avatar.png\" />\n                                    </a>\n                                </div>\n                                <div class=\"col-8\">\n                                    <a *ngIf=\"!editEnabled\" class=\" btn btn-sm btn-primary mb-2\" style=\"width: 120px;\"\n                                        href=\"javascript:void(0)\" (click)=\"confirm()\">\n                                        Change Avatar\n                                    </a><br>\n                                    <a *ngIf=\"!editEnabled\" style=\"width: 120px;\" class=\" btn btn-sm btn-warning\"\n                                        href=\"javascript:void(0)\" (click)=\"confirm()\">\n                                        Delete Avatar\n                                    </a>\n                                </div>\n                            </div>\n                        </div>\n                    </form>\n                    <form [formGroup]=\"editForm\" *ngIf=\"editEnabled\">\n                        <h6 class=\"heading-small text-muted mb-4\">User information</h6>\n\n                        <div class=\"pl-lg-4\">\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Nama Penuh\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"Ali Imran\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        No Kad Pengenalan\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\" placeholder=\"Name\"\n                                        type=\"text\" value=\"890103085322\" disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Agensi/Organisasi\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Name\" type=\"text\" value=\"Kementerian Tenaga dan Sumber Asli \"\n                                        disabled />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Bahagian\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\"\n                                        placeholder=\"Bahagian\" type=\"text\" value=\"Bahagian Pengurusan Maklumat\"\n                                        formControlName=\"bahagian\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Sektor\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Nyatakan jenis sektor\" type=\"text\" value=\"Kerajaan\"\n                                        formControlName=\"sektor\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Emel\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\"\n                                        placeholder=\"Masukan E-mel anda\" type=\"text\" value=\"tarmizi@ketsa.com.my\"\n                                        formControlName=\"emel\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Telefon Pejabat\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-3\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Nombor Telefon Pejabat\" type=\"text\" value=\"0456789234\"\n                                        formControlName=\"officephone\" />\n                                </div>\n                                <div class=\"col-2\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Telefon Bimbit\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-3\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Nombor Telefon Bimbit\" type=\"text\" value=\"0123456789\"\n                                        formControlName=\"mobilephone\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Peranan\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <select class=\" form-control form-control-sm ml-3\" id=\"category\">\n                                        <option selected> Pilih Peranan </option>\n                                        <option value=\"penerbit\">Penerbit Metadata</option>\n                                        <option value=\"pengesah\">Pengesah Metadata</option>\n                                        <option value=\"vw\">VW</option>\n                                    </select>\n                                </div>\n                            </div>\n                        </div>\n\n                        <hr class=\"my-4\" />\n\n                        <h6 class=\"heading-small text-muted mb-4\">Tukar Kata Laluan</h6>\n\n                        <div class=\"pl-lg-4\">\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Kata Laluan Lama\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Masukkan Kata Laluan Anda\" type=\"password\" value=\"\"\n                                        formControlName=\"passw\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Kata Laluan Baru\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-nric\"\n                                        placeholder=\"Masukkan Kata Laluan Baru\" type=\"password\" value=\"\"\n                                        formControlName=\"passw\" />\n                                </div>\n                            </div>\n                            <div class=\"row mb-2\">\n                                <div class=\"col-3\">\n                                    <label class=\"form-control-label mr-4\" for=\"input-username\">\n                                        Sah Kata Laluan Baru\n                                    </label><label class=\"float-right\">:</label>\n                                </div>\n                                <div class=\"col-8\">\n                                    <input class=\"form-control form-control-sm ml-3\" id=\"input-username\"\n                                        placeholder=\"Sahkan Kata Laluan\" type=\"password\" value=\"\"\n                                        formControlName=\"passw\" />\n                                </div>\n                            </div>\n                            <hr class=\"my-4\" />\n                            <div class=\"row mt-3\">\n                                <div class=\"col\">\n                                    <a *ngIf=\"editEnabled\" class=\"float-right btn btn-sm btn-warning\"\n                                        href=\"javascript:void(0)\" (click)=\"confirmPassword()\">\n                                        Save Password\n                                    </a>\n                                </div>\n                            </div>\n                        </div>\n                    </form>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/report/report.component.html":
/*!***********************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/report/report.component.html ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\"header pb-6\">\n    <div class=\"container-fluid\">\n        <div class=\"header-body\">\n            <div class=\"row align-items-center py-4\">\n                <div class=\"col-lg-6 col-7\">\n                    <h6 class=\"h2 text-dark d-inline-block mb-0\">Reporting</h6>\n\n                    <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n                        <ol class=\"breadcrumb breadcrumb-links breadcrumb-dark\">\n                            <li class=\" breadcrumb-item\">\n                                <a href=\"javascript:void(0)\"> <i class=\"fas fa-chart-bar text-dark\"> </i> </a>\n                            </li>\n                            <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                                Reporting\n                            </li>\n                        </ol>\n                    </nav>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"container-fluid mt--6\">\n    <div class=\"row\">\n        <div class=\"col-md-12\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Reporting Tool</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"row\">\n                        <div class=\"col-md-12 col-lg-5\">\n                            <div class=\"form-group\">\n                                <label class=\"form-control-label\">Report type</label>\n                                <select class=\"form-control custom-select\">\n                                    <option hidden selected>Please pick</option>\n                                    <option>Report 1</option>\n                                    <option>Report 2</option>\n                                    <option>Report 3</option>\n                                    <option>Report 4</option>\n                                </select>\n                            </div>\n                        </div>\n                        <div class=\"col-md-12 col-lg-5\">\n                            <div class=\"form-group\">\n                                <label class=\"form-control-label\">Date range</label>\n                                <div class=\"input-group\">\n                                    <div class=\"input-group-prepend\">\n                                      <span class=\"input-group-text\"><i class=\"far fa-calendar-alt\"></i></span>\n                                    </div>\n                                    <input \n                                        type=\"text\"\n                                        class=\"form-control\"\n                                        bsDaterangepicker\n                                        [bsConfig]=\"bsDPConfig\"\n                                        placeholder=\"Date range\"\n                                        name=\"bsDaterangepicker\"\n                                    >\n                                  </div>\n                            </div>\n                        </div>\n                        <div class=\"col-md-12 col-lg-2 d-flex align-items-center\">\n                            <button class=\"btn btn-default\" type=\"button\">Search</button>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div class=\"row\">\n        <div class=\"col-md-12 col-lg-6\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Report 1</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n        <div class=\"col-md-12 col-lg-6\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Report 2</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv1\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div class=\"row\">\n        <div class=\"col-md-12 col-lg-6\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Report 3</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv2\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n        <div class=\"col-md-12 col-lg-6\">\n            <div class=\"card\">\n                <div class=\"card-header bg-secondary\">\n                    <h3 class=\"m-0\">Report 4</h3>\n                </div>\n                <div class=\"card-body\">\n                    <div class=\"chart\">\n                        <div class=\"amchart\" id=\"chartdiv3\"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/valuation/valuation.component.html":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/valuation/valuation.component.html ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<div class=\" header pb-6\">\n  <div class=\" container-fluid\">\n    <div class=\" header-body\">\n      <div class=\" row align-items-center py-4\">\n        <div class=\" col-lg-6 col-7\">\n          <h6 class=\" h2 d-inline-block mb-0\">Penilaian</h6>\n\n          <nav aria-label=\"breadcrumb\" class=\" d-none d-md-inline-block ml-md-4\">\n\n            <ol class=\" breadcrumb breadcrumb-links breadcrumb-dark\">\n              <li class=\" breadcrumb-item\">\n                <a href=\"javascript:void(0)\"> <i class=\" fas fa-home text-dark\"> </i> </a>\n              </li>\n\n              <li aria-current=\"page\" class=\"breadcrumb-item active\">\n                Data Asas\n              </li>\n\n            </ol>\n          </nav>\n        </div>\n\n        <div class=\" col-lg-6 col-5 text-right\">\n          <a *ngIf=\"editEnabled\" class=\"btn btn-danger btn-sm text-white btn-icon btn-3\" (click)=\"toggleForm()\">\n            <span class=\"btn-inner--icon\"><i class=\"fas fa-arrow-left\"></i></span>\n            <span class=\"btn-inner--text\">Balik</span>\n          </a>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<div class=\" container-fluid mt--6\">\n  <div class=\" row\">\n    <div class=\" col\">\n      <div class=\" card\">\n        <div *ngIf=\"!editEnabled\" class=\" card-header\">\n          <div class=\"row mb-0\">\n            <div class=\"col-sm-12 col-md-6\">\n              <div class=\"dataTables_length\" id=\"datatable_length\">\n                <label>\n                  Papar\n                  <select name=\"datatable_length\" aria-controls=\"datatable\" class=\"form-control form-control-sm\"\n                    (change)=\"entriesChange($event)\">\n\n                    <option value=\"5\" [selected]=\"entries == 5\">5</option>\n                    <option value=\"10\" [selected]=\"entries == 10\">10</option>\n                    <option value=\"25\" [selected]=\"entries == 25\">25</option>\n                    <option value=\"50\" [selected]=\"entries == 50\">50</option>\n                    <option value=\"-1\" [selected]=\"entries == -1\">All</option>\n                  </select>\n                  rekod\n                </label>\n              </div>\n            </div>\n            <div class=\"col-sm-12 col-md-6\">\n              <!-- <div id=\"datatable_filter\" class=\"dataTables_filter\">\n                  <label>\n                    <input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"Carian Metadata\"\n                      aria-controls=\"datatable\" (keyup)=\"filterTable($event)\" />\n                  </label>\n                </div> -->\n            </div>\n          </div>\n        </div>\n        <div *ngIf=\"!editEnabled\" class=\"dataTables_wrapper py-4\">\n          <ngx-datatable class=\"bootstrap selection-cell\" [columnMode]=\"'force'\" [headerHeight]=\"50\" [footerHeight]=\"50\"\n            [rowHeight]=\"'auto'\" [limit]=\"entries != -1 ? entries : undefined\" [rows]=\"temp\"\n            (activate)=\"onActivate($event)\">\n\n            <ngx-datatable-column name=\"Bil\" [width]=\"100\">\n              <ng-template ngx-datatable-cell-template let-rowIndex=\"rowIndex\" let-row=\"row\">\n                {{rowIndex+1}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column>\n              <ng-template ngx-datatable-header-template>\n                <span>Nama Permohonan</span>\n              </ng-template>\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapermohonan}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column>\n              <ng-template ngx-datatable-header-template>\n                <span>Nama Pemohon</span>\n              </ng-template>\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                {{row.namapemohon}}\n              </ng-template>\n            </ngx-datatable-column>\n            <ngx-datatable-column name=\"Kategori\"></ngx-datatable-column>\n            <ngx-datatable-column name=\"Tindakan\">\n              <ng-template let-row=\"row\" ngx-datatable-cell-template>\n                <a class=\"btn btn-sm btn-warning text-white\" (click)=\"toggleForm()\"><i\n                    class=\"fas fa-file-export\"></i><span>Lihat Penilaian</span></a>\n              </ng-template>\n            </ngx-datatable-column>\n\n          </ngx-datatable>\n        </div>\n\n        <div *ngIf=\"editEnabled\" class=\"card-header bg-default\">\n          <div class=\"row align-items-center\">\n            <div class=\"col-8\">\n              <h3 class=\"text-white mb-0\">Borang Penilaian Data</h3>\n            </div>\n\n            <div class=\"col-4 text-right\">\n            </div>\n          </div>\n        </div>\n\n        <div *ngIf=\"editEnabled\" class=\"card-body py-4 px-\">\n          <div class=\"row\">\n            <div class=\"col-xl-12 text-right\">\n              <h6 class=\"heading text-muted\">Lampiran 3</h6>\n            </div>\n          </div>\n          <div class=\"row text-center\">\n            <div class=\"col-xl-12\">\n              <h3 class=\"text-dark\">BORANG PENILAIAN PERKONGSIAN DATA GEOSPATIAL<br>PUSAT GEOSPATIAL NEGARA\n                (PGN)</h3>\n            </div>\n          </div>\n          <hr class=\"my-2 bg-dark\">\n          <ul align=\"justify\">\n            <li>Borang penilaian ini dibentuk untuk mendapatkan maklumbalas tentang kualiti perkongsian data melalui\n              MyGDI yang disediakan oleh Pusat Geospatial Negara (PGN).</li>\n            <li>Kami mengalu-alukan kerjasama dari pihak YBhg. Dato'/ Datin/Prof./Dr./Tuan/Puan untuk mengisi borang\n              soal selidik ini dan diharapkan dapat membantu memperbaiki dan menambahbaik kualiti perkongsian data yang\n              diberikan.</li>\n          </ul>\n          <div class=\"py-2 mt-2 bg-light\">\n            <h3 class=\"text-dark mb-0 text-center\">BAHAGIAN A: MAKLUMAT PEMOHON/PENGGUNA</h3>\n          </div>\n          <div class=\"px-2\">\n            <div class=\"py-4\" style=\"font-weight: bold;\">Sila tandakan [&#10003;] pada ruangan yang berkenaan.</div>\n            <div class=\"mb-3\">1.&nbsp; Kategori Pengguna</div>\n            <div class=\"row pl-lg-5 mb-4\">\n              <div class=\"col-xl-12\">\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input class=\" custom-control-input\" id=\"radioCheck1\" name=\"custom-radio-3\" type=\"radio\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck1\">\n                    Agensi Persekutuan\n                  </label>\n                </div>\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input class=\" custom-control-input\" id=\"radioCheck2\" name=\"custom-radio-3\" type=\"radio\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck2\">\n                    Agensi Negeri\n                  </label>\n                </div>\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input class=\"custom-control-input\" id=\"radioCheck3\" name=\"custom-radio-3\" type=\"radio\" />\n                  <label class=\"custom-control-label\" for=\"radioCheck3\">\n                    Pelajar/Penyelidik\n                  </label>\n                </div>\n              </div>\n            </div>\n            <div class=\"my-4\">2.&nbsp; Sumber maklumat tentang kesediaan data yang dipohon</div>\n            <div class=\"row pl-lg-2 mb-4\">\n              <div class=\"col-xl-4\">\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input [(ngModel)]=\"checkOther\" class=\" custom-control-input\" id=\"radioCheck21\" name=\"custom-radio-2\"\n                    type=\"radio\" value=\"1\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck21\">\n                    Internet (MyGeo Explorer)\n                  </label>\n                </div>\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input [(ngModel)]=\"checkOther\" class=\" custom-control-input\" id=\"radioCheck22\" name=\"custom-radio-2\"\n                    type=\"radio\" value=\"2\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck22\">\n                    Simposium/Pameran/Brochure\n                  </label>\n                </div>\n              </div>\n              <div class=\"col-xl-4\">\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input [(ngModel)]=\"checkOther\" class=\" custom-control-input\" id=\"radioCheck23\" name=\"custom-radio-2\"\n                    type=\"radio\" value=\"3\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck23\">\n                    Agensi Kerajaan Lain\n                  </label>\n                </div>\n                <div class=\" custom-control custom-radio mb-2\">\n                  <input [(ngModel)]=\"checkOther\" class=\" custom-control-input\" id=\"radioCheck24\" name=\"custom-radio-2\"\n                    type=\"radio\" value=\"4\" />\n                  <label class=\" custom-control-label\" for=\"radioCheck24\">\n                    Lain-Lain\n                  </label>\n                </div>\n                <div *ngIf=\"checkOther == 4\" class=\" custom-control custom-radio mb-2\">\n                  <input class=\"form-control form-control-sm\" id=\"others\" type=\"text\" placeholder=\"Sila Nyatakan ...\" />\n                </div>\n              </div>\n            </div>\n          </div>\n\n          <div class=\"py-2 mt-2 bg-light\">\n            <h4 class=\"heading text-dark mb-0 text-center\">BAHAGIAN B: PENILAIAN PENGURUSAN PERKONGSIAN DATA GEOSPATIAL\n            </h4>\n          </div>\n          <div class=\"px-2\">\n            <div class=\"py-4\" style=\"font-weight: bold;\">Sila tandakan [&#10003;] pada ruangan yang berkenaan mengikut\n              sekala penilaian yang diberikan.</div>\n            <div class=\"form-inline pl-5\">\n              <label class=\"mr-4\"><b class=\"bg-light mr-2\">&nbsp;1&nbsp;</b> Tidak Memuaskan</label>\n              <label class=\"mr-4\"><b class=\"bg-light mr-2\">&nbsp;2&nbsp;</b> Kurang Memuaskan</label>\n              <label class=\"mr-4\"><b class=\"bg-light mr-2\">&nbsp;3&nbsp;</b> Memuaskan</label>\n              <label class=\"mr-4\"><b class=\"bg-light mr-2\">&nbsp;4&nbsp;</b> Baik</label>\n              <label class=\"mr-4\"><b class=\"bg-light mr-2\">&nbsp;5&nbsp;</b> Cemerlang</label>\n            </div>\n            <div class=\"row py-4\">\n              <div class=\"col-xl-12 px-5\">\n                <table>\n                  <tr class=\"bg-light\">\n                    <th class=\"text-center\" colspan=\"2\" rowspan=\"2\">Pengurusan Perkongsian Data Geospatial</th>\n                    <th class=\"text-center\" colspan=\"5\">Skala Penilaian</th>\n                  </tr>\n                  <tr class=\"bg-light\">\n                    <th>1</th>\n                    <th>2</th>\n                    <th>3</th>\n                    <th>4</th>\n                    <th>5</th>\n                  </tr>\n                  <tr>\n                    <td>a.</td>\n                    <td>Proses kelulusan permohonan data adalah cepat dan efektif</td>\n                    <td><input type=\"radio\" name=\"row1\"></td>\n                    <td><input type=\"radio\" name=\"row1\"></td>\n                    <td><input type=\"radio\" name=\"row1\"></td>\n                    <td><input type=\"radio\" name=\"row1\"></td>\n                    <td><input type=\"radio\" name=\"row1\"></td>\n                  </tr>\n                  <tr>\n                    <td>b.</td>\n                    <td>Data yang diberikan menepati keperluan pengguna</td>\n                    <td><input type=\"radio\" name=\"row2\"></td>\n                    <td><input type=\"radio\" name=\"row2\"></td>\n                    <td><input type=\"radio\" name=\"row2\"></td>\n                    <td><input type=\"radio\" name=\"row2\"></td>\n                    <td><input type=\"radio\" name=\"row2\"></td>\n                  </tr>\n                  <tr>\n                    <td>c.</td>\n                    <td>Kaedah perkongsian data yang diamalkan adalah selamat </td>\n                    <td><input type=\"radio\" name=\"row3\"></td>\n                    <td><input type=\"radio\" name=\"row3\"></td>\n                    <td><input type=\"radio\" name=\"row3\"></td>\n                    <td><input type=\"radio\" name=\"row3\"></td>\n                    <td><input type=\"radio\" name=\"row3\"></td>\n                  </tr>\n                  <tr>\n                    <td>d.</td>\n                    <td>Data yang diterima adalah selamat untuk digunakan (no viruses, not corrupted)</td>\n                    <td><input type=\"radio\" name=\"row4\"></td>\n                    <td><input type=\"radio\" name=\"row4\"></td>\n                    <td><input type=\"radio\" name=\"row4\"></td>\n                    <td><input type=\"radio\" name=\"row4\"></td>\n                    <td><input type=\"radio\" name=\"row4\"></td>\n                  </tr>\n                  <tr>\n                    <td>e.</td>\n                    <td>Adakah serahan data ini selamat dan terjamin </td>\n                    <td><input type=\"radio\" name=\"row5\"></td>\n                    <td><input type=\"radio\" name=\"row5\"></td>\n                    <td><input type=\"radio\" name=\"row5\"></td>\n                    <td><input type=\"radio\" name=\"row5\"></td>\n                    <td><input type=\"radio\" name=\"row5\"></td>\n                  </tr>\n                  <tr>\n                    <td>f.</td>\n                    <td>Kawalan keselamatan terhadap proses serahan data yang dipraktikkan adalah memadai (encryption\n                      data, password)</td>\n                    <td><input type=\"radio\" name=\"row6\"></td>\n                    <td><input type=\"radio\" name=\"row6\"></td>\n                    <td><input type=\"radio\" name=\"row6\"></td>\n                    <td><input type=\"radio\" name=\"row6\"></td>\n                    <td><input type=\"radio\" name=\"row6\"></td>\n                  </tr>\n                  <tr>\n                    <td>g.</td>\n                    <td>Pemohon mendapat kerjasama yang baik daripada pegawai yang menguruskan permohonan data.</td>\n                    <td><input type=\"radio\" name=\"row7\"></td>\n                    <td><input type=\"radio\" name=\"row7\"></td>\n                    <td><input type=\"radio\" name=\"row7\"></td>\n                    <td><input type=\"radio\" name=\"row7\"></td>\n                    <td><input type=\"radio\" name=\"row7\"></td>\n                  </tr>\n                </table>\n              </div>\n            </div>\n          </div>\n\n          <div class=\"py-2 my-4 bg-light\">\n            <h4 class=\"heading text-dark mb-0 text-center\">BAHAGIAN C: PENGUNAAN DATA</h4>\n          </div>\n          <div class=\"px-2\">\n            <div class=\"row mb-4\">\n              <div class=\"col-xl-10\">\n                <div class=\"my-2\">1.&nbsp;&nbsp; Kegunaan utama data yang dipohon. (Sila nyatakan)</div>\n                <input class=\"form-control form-control-sm ml-4\" type=\"text\">\n              </div>\n            </div>\n            <div class=\"row\">\n              <div class=\"col-xl-8\">\n                <div class=\"mb-2\">2.&nbsp;&nbsp; Data yang diterima telah ditambahnilai <i>(value added)</i></div>\n                <div class=\"row pl-lg-4 mb-4\">\n                  <div class=\"col-xl-3\">\n                    <div class=\"custom-control custom-radio mb-2\">\n                      <input class=\" custom-control-input\" type=\"radio\" id=\"choice1\" name=\"yes2\"><label\n                        class=\"custom-control-label\" for=\"choice1\">\n                        Ya\n                      </label>\n                    </div>\n                  </div>\n                  <div class=\"col-xl-4\">\n                    <div class=\"custom-control custom-radio\">\n                      <input class=\" custom-control-input\" type=\"radio\" id=\"choice2\" name=\"yes2\"><label\n                        class=\"custom-control-label\" for=\"choice2\">\n                        Tidak\n                      </label>\n                    </div>\n                  </div>\n                </div>\n\n                <div class=\"mb-2\">3.&nbsp;&nbsp; Data yang diterima telah dimanfaatkan sepenuhnya</div>\n                <div class=\"row pl-lg-4 mb-4\">\n                  <div class=\"col-xl-3\">\n                    <div class=\"custom-control custom-radio mb-2\">\n                      <input class=\" custom-control-input\" type=\"radio\" id=\"choice1\" name=\"yes2\"><label\n                        class=\"custom-control-label\" for=\"choice1\">\n                        Ya\n                      </label>\n                    </div>\n                  </div>\n                  <div class=\"col-xl-4\">\n                    <div class=\"custom-control custom-radio\">\n                      <input class=\" custom-control-input\" type=\"radio\" id=\"choice2\" name=\"yes2\"><label\n                        class=\"custom-control-label\" for=\"choice2\">\n                        Tidak\n                      </label>\n                    </div>\n                  </div>\n                </div>\n              </div>\n            </div>\n            <div class=\"mb-2\">4.&nbsp;&nbsp; Berikut merupakan screenshot kajian/analisis/laporan yang sedang/telah\n              dilaksanakan menggunakan data yang dikongsi melalui MyGeo Explorer. \n            </div>\n            <div [formGroup]=\"myForm\">\n              <div class=\"container p-0\" style=\"border: 1px solid lightgray; border-radius: .25rem; min-height: 200px;\">\n                <input formControlName=\"file\" id=\"file\" type=\"file\" class=\"form-control\" accept=\"image/*\"\n                  (change)=\"onFileChange($event)\" sytle=\"border: none;\">\n                <img [src]=\"imageSrc\" *ngIf=\"imageSrc\" style=\"max-height: 500px; max-width: 900px\" class=\"p-2\"\n                  alt=\"...\">\n              </div>\n            </div>\n            <div class=\"small py-4\">Pihak kami mengalu-alukan sekiranya terdapat komen atau cadangan bagi meningkatkan\n              pengurusan perkongsian data melalui MyGeo Explorer.  Terima Kasih.\n            </div>\n            <h4 style=\"font-weight: bold;\">Komen / Cadangan</h4>\n            <textarea class=\"form-control form-control-sm mb-4\" rows=\"3\" type=\"text\"\n              placeholder=\"Masukkan Komen / Cadangan anda disini ...\">\n            </textarea>\n            <hr class=\"my-2 bg-dark\">\n            <div class=\"container p-3\">\n              <div class=\"row mb-2\">\n                <div class=\"col-6\">\n                  <label class=\"form-control-label\">Nama</label>\n                  <input class=\"form-control form-control-sm\" type=\"text\">\n                </div>\n                <div class=\"col-6\">\n                  <label class=\"form-control-label\">Emel</label>\n                  <input class=\"form-control form-control-sm\" type=\"text\">\n                </div>\n              </div>\n              <div class=\"row\">\n                <div class=\"col-6\">\n                  <label class=\"form-control-label\">No Telefon</label>\n                  <input class=\"form-control form-control-sm\" type=\"text\">\n                </div>\n              </div>\n            </div>\n          </div>\n          <div class=\"row mb-0 mt-5\">\n            <div class=\"col-xl-12\">\n              <h6 class=\"heading text-muted\">PGN-ISMS-P3-019-002-260</h6>\n            </div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>");

/***/ }),

/***/ "./src/app/core/admin/admin.module.ts":
/*!********************************************!*\
  !*** ./src/app/core/admin/admin.module.ts ***!
  \********************************************/
/*! exports provided: AdminModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AdminModule", function() { return AdminModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _management_updatedata_class_sharecategory_class_sharecategory_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./management-updatedata/class-sharecategory/class-sharecategory.component */ "./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.ts");
/* harmony import */ var _management_updatedata_class_category_class_category_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./management-updatedata/class-category/class-category.component */ "./src/app/core/admin/management-updatedata/class-category/class-category.component.ts");
/* harmony import */ var _management_updatedata_datalist_datalist_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./management-updatedata/datalist/datalist.component */ "./src/app/core/admin/management-updatedata/datalist/datalist.component.ts");
/* harmony import */ var _management_updatedata_dataprice_dataprice_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./management-updatedata/dataprice/dataprice.component */ "./src/app/core/admin/management-updatedata/dataprice/dataprice.component.ts");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var ngx_quill__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ngx-quill */ "./node_modules/ngx-quill/__ivy_ngcc__/fesm5/ngx-quill.js");
/* harmony import */ var ngx_bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ngx-bootstrap/datepicker */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/datepicker/fesm5/ngx-bootstrap-datepicker.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var _swimlane_ngx_datatable__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @swimlane/ngx-datatable */ "./node_modules/@swimlane/ngx-datatable/__ivy_ngcc__/fesm5/swimlane-ngx-datatable.js");
/* harmony import */ var _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @ngx-loading-bar/core */ "./node_modules/@ngx-loading-bar/core/__ivy_ngcc__/fesm5/ngx-loading-bar-core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm5/router.js");
/* harmony import */ var _admin_routing__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./admin.routing */ "./src/app/core/admin/admin.routing.ts");
/* harmony import */ var _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./dashboard/dashboard.component */ "./src/app/core/admin/dashboard/dashboard.component.ts");
/* harmony import */ var _management_audit_management_audit_component__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./management-audit/management-audit.component */ "./src/app/core/admin/management-audit/management-audit.component.ts");
/* harmony import */ var _management_user_management_user_component__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./management-user/management-user.component */ "./src/app/core/admin/management-user/management-user.component.ts");
/* harmony import */ var _report_report_component__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./report/report.component */ "./src/app/core/admin/report/report.component.ts");
/* harmony import */ var _datatable_datatable_component__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./datatable/datatable.component */ "./src/app/core/admin/datatable/datatable.component.ts");
/* harmony import */ var _management_faq_management_faq_component__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./management-faq/management-faq.component */ "./src/app/core/admin/management-faq/management-faq.component.ts");
/* harmony import */ var _management_annoucement_management_annoucement_component__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./management-annoucement/management-annoucement.component */ "./src/app/core/admin/management-annoucement/management-annoucement.component.ts");
/* harmony import */ var _management_userguide_management_userguide_component__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ./management-userguide/management-userguide.component */ "./src/app/core/admin/management-userguide/management-userguide.component.ts");
/* harmony import */ var _admin_profile_profile_component__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! ../admin/profile/profile.component */ "./src/app/core/admin/profile/profile.component.ts");
/* harmony import */ var _feedback_feedback_component__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! ./feedback/feedback.component */ "./src/app/core/admin/feedback/feedback.component.ts");
/* harmony import */ var _management_processdata_management_processdata_component__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! ./management-processdata/management-processdata.component */ "./src/app/core/admin/management-processdata/management-processdata.component.ts");
/* harmony import */ var _management_appstatus_management_appstatus_component__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! ./management-appstatus/management-appstatus.component */ "./src/app/core/admin/management-appstatus/management-appstatus.component.ts");
/* harmony import */ var _management_newapp_management_newapp_component__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! ./management-newapp/management-newapp.component */ "./src/app/core/admin/management-newapp/management-newapp.component.ts");
/* harmony import */ var _management_elementmetadata_management_elementmetadata_component__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! ./management-elementmetadata/management-elementmetadata.component */ "./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.ts");
/* harmony import */ var _valuation_valuation_component__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! ./valuation/valuation.component */ "./src/app/core/admin/valuation/valuation.component.ts");






























var AdminModule = /** @class */ (function () {
    function AdminModule() {
    }
    AdminModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_5__["NgModule"])({
            declarations: [
                _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_15__["DashboardComponent"],
                _management_audit_management_audit_component__WEBPACK_IMPORTED_MODULE_16__["ManagementAuditComponent"],
                _management_user_management_user_component__WEBPACK_IMPORTED_MODULE_17__["ManagementUserComponent"],
                _report_report_component__WEBPACK_IMPORTED_MODULE_18__["ReportComponent"],
                _datatable_datatable_component__WEBPACK_IMPORTED_MODULE_19__["DatatableComponent"],
                _management_faq_management_faq_component__WEBPACK_IMPORTED_MODULE_20__["ManagementFaqComponent"],
                _management_annoucement_management_annoucement_component__WEBPACK_IMPORTED_MODULE_21__["ManagementAnnoucementComponent"],
                _management_userguide_management_userguide_component__WEBPACK_IMPORTED_MODULE_22__["ManagementUserguideComponent"],
                _admin_profile_profile_component__WEBPACK_IMPORTED_MODULE_23__["ProfileComponent"],
                _feedback_feedback_component__WEBPACK_IMPORTED_MODULE_24__["FeedbackComponent"],
                _management_processdata_management_processdata_component__WEBPACK_IMPORTED_MODULE_25__["ManagementProcessdataComponent"],
                _management_appstatus_management_appstatus_component__WEBPACK_IMPORTED_MODULE_26__["ManagementAppstatusComponent"],
                _management_newapp_management_newapp_component__WEBPACK_IMPORTED_MODULE_27__["ManagementNewappComponent"],
                _management_elementmetadata_management_elementmetadata_component__WEBPACK_IMPORTED_MODULE_28__["ManagementElementmetadataComponent"],
                _valuation_valuation_component__WEBPACK_IMPORTED_MODULE_29__["ValuationComponent"],
                _management_updatedata_dataprice_dataprice_component__WEBPACK_IMPORTED_MODULE_4__["DatapriceComponent"],
                _management_updatedata_datalist_datalist_component__WEBPACK_IMPORTED_MODULE_3__["DatalistComponent"],
                _management_updatedata_class_category_class_category_component__WEBPACK_IMPORTED_MODULE_2__["ClassCategoryComponent"],
                _management_updatedata_class_sharecategory_class_sharecategory_component__WEBPACK_IMPORTED_MODULE_1__["ClassSharecategoryComponent"]
            ],
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_6__["CommonModule"],
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["AccordionModule"].forRoot(),
                ngx_bootstrap_datepicker__WEBPACK_IMPORTED_MODULE_9__["BsDatepickerModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["BsDropdownModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["ModalModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["ProgressbarModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["TabsModule"].forRoot(),
                ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["TooltipModule"].forRoot(),
                _angular_forms__WEBPACK_IMPORTED_MODULE_10__["FormsModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_10__["ReactiveFormsModule"],
                _ngx_loading_bar_core__WEBPACK_IMPORTED_MODULE_12__["LoadingBarModule"],
                _swimlane_ngx_datatable__WEBPACK_IMPORTED_MODULE_11__["NgxDatatableModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_13__["RouterModule"].forChild(_admin_routing__WEBPACK_IMPORTED_MODULE_14__["AdminRoutes"]),
                ngx_quill__WEBPACK_IMPORTED_MODULE_8__["QuillModule"].forRoot({
                    modules: {
                        syntax: false,
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [{ 'header': 1 }, { 'header': 2 }],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'indent': '-1' }, { 'indent': '+1' }],
                            [{ 'direction': 'rtl' }],
                            [{ 'size': ['small', false, 'large', 'huge'] }],
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'font': [] }],
                            [{ 'align': [] }],
                            ['clean'],
                            ['link', 'image', 'video'] // link and image, video
                        ]
                    },
                })
            ]
        })
    ], AdminModule);
    return AdminModule;
}());



/***/ }),

/***/ "./src/app/core/admin/admin.routing.ts":
/*!*********************************************!*\
  !*** ./src/app/core/admin/admin.routing.ts ***!
  \*********************************************/
/*! exports provided: AdminRoutes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AdminRoutes", function() { return AdminRoutes; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _management_updatedata_class_sharecategory_class_sharecategory_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./management-updatedata/class-sharecategory/class-sharecategory.component */ "./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.ts");
/* harmony import */ var _management_updatedata_class_category_class_category_component__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./management-updatedata/class-category/class-category.component */ "./src/app/core/admin/management-updatedata/class-category/class-category.component.ts");
/* harmony import */ var _management_updatedata_datalist_datalist_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./management-updatedata/datalist/datalist.component */ "./src/app/core/admin/management-updatedata/datalist/datalist.component.ts");
/* harmony import */ var _management_elementmetadata_management_elementmetadata_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./management-elementmetadata/management-elementmetadata.component */ "./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.ts");
/* harmony import */ var _management_newapp_management_newapp_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./management-newapp/management-newapp.component */ "./src/app/core/admin/management-newapp/management-newapp.component.ts");
/* harmony import */ var _management_appstatus_management_appstatus_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./management-appstatus/management-appstatus.component */ "./src/app/core/admin/management-appstatus/management-appstatus.component.ts");
/* harmony import */ var _management_processdata_management_processdata_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./management-processdata/management-processdata.component */ "./src/app/core/admin/management-processdata/management-processdata.component.ts");
/* harmony import */ var _management_annoucement_management_annoucement_component__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./management-annoucement/management-annoucement.component */ "./src/app/core/admin/management-annoucement/management-annoucement.component.ts");
/* harmony import */ var _datatable_datatable_component__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./datatable/datatable.component */ "./src/app/core/admin/datatable/datatable.component.ts");
/* harmony import */ var _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./dashboard/dashboard.component */ "./src/app/core/admin/dashboard/dashboard.component.ts");
/* harmony import */ var _management_audit_management_audit_component__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./management-audit/management-audit.component */ "./src/app/core/admin/management-audit/management-audit.component.ts");
/* harmony import */ var _management_user_management_user_component__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./management-user/management-user.component */ "./src/app/core/admin/management-user/management-user.component.ts");
/* harmony import */ var _report_report_component__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./report/report.component */ "./src/app/core/admin/report/report.component.ts");
/* harmony import */ var _management_faq_management_faq_component__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./management-faq/management-faq.component */ "./src/app/core/admin/management-faq/management-faq.component.ts");
/* harmony import */ var _management_userguide_management_userguide_component__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./management-userguide/management-userguide.component */ "./src/app/core/admin/management-userguide/management-userguide.component.ts");
/* harmony import */ var _profile_profile_component__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./profile/profile.component */ "./src/app/core/admin/profile/profile.component.ts");
/* harmony import */ var _feedback_feedback_component__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./feedback/feedback.component */ "./src/app/core/admin/feedback/feedback.component.ts");
/* harmony import */ var _valuation_valuation_component__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./valuation/valuation.component */ "./src/app/core/admin/valuation/valuation.component.ts");
/* harmony import */ var _management_updatedata_dataprice_dataprice_component__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./management-updatedata/dataprice/dataprice.component */ "./src/app/core/admin/management-updatedata/dataprice/dataprice.component.ts");




















var AdminRoutes = [
    {
        path: '',
        children: [
            {
                path: 'dashboard',
                component: _dashboard_dashboard_component__WEBPACK_IMPORTED_MODULE_10__["DashboardComponent"]
            },
            {
                path: 'management',
                children: [
                    {
                        path: 'audit-trails',
                        component: _management_audit_management_audit_component__WEBPACK_IMPORTED_MODULE_11__["ManagementAuditComponent"]
                    },
                    {
                        path: 'user',
                        component: _management_user_management_user_component__WEBPACK_IMPORTED_MODULE_12__["ManagementUserComponent"]
                    },
                    {
                        path: 'faq',
                        component: _management_faq_management_faq_component__WEBPACK_IMPORTED_MODULE_14__["ManagementFaqComponent"]
                    },
                    {
                        path: 'annoucement',
                        component: _management_annoucement_management_annoucement_component__WEBPACK_IMPORTED_MODULE_8__["ManagementAnnoucementComponent"]
                    },
                    {
                        path: 'userguide',
                        component: _management_userguide_management_userguide_component__WEBPACK_IMPORTED_MODULE_15__["ManagementUserguideComponent"]
                    },
                    {
                        path: 'tabledata',
                        component: _datatable_datatable_component__WEBPACK_IMPORTED_MODULE_9__["DatatableComponent"]
                    },
                    {
                        path: 'dataprocess',
                        component: _management_processdata_management_processdata_component__WEBPACK_IMPORTED_MODULE_7__["ManagementProcessdataComponent"]
                    },
                    {
                        path: 'applicationstatus',
                        component: _management_appstatus_management_appstatus_component__WEBPACK_IMPORTED_MODULE_6__["ManagementAppstatusComponent"]
                    },
                    {
                        path: 'newapplication',
                        component: _management_newapp_management_newapp_component__WEBPACK_IMPORTED_MODULE_5__["ManagementNewappComponent"]
                    },
                    {
                        path: 'update-element',
                        component: _management_elementmetadata_management_elementmetadata_component__WEBPACK_IMPORTED_MODULE_4__["ManagementElementmetadataComponent"]
                    },
                    {
                        path: 'valuation',
                        component: _valuation_valuation_component__WEBPACK_IMPORTED_MODULE_18__["ValuationComponent"]
                    }, {
                        path: 'dataasas',
                        children: [
                            {
                                path: 'datalist',
                                component: _management_updatedata_datalist_datalist_component__WEBPACK_IMPORTED_MODULE_3__["DatalistComponent"]
                            },
                            {
                                path: 'class-category',
                                component: _management_updatedata_class_category_class_category_component__WEBPACK_IMPORTED_MODULE_2__["ClassCategoryComponent"]
                            },
                            {
                                path: 'class-sharecategory',
                                component: _management_updatedata_class_sharecategory_class_sharecategory_component__WEBPACK_IMPORTED_MODULE_1__["ClassSharecategoryComponent"]
                            },
                            {
                                path: 'dataprice',
                                component: _management_updatedata_dataprice_dataprice_component__WEBPACK_IMPORTED_MODULE_19__["DatapriceComponent"]
                            }
                        ]
                    }
                ]
            },
            {
                path: 'report',
                component: _report_report_component__WEBPACK_IMPORTED_MODULE_13__["ReportComponent"]
            },
            {
                path: 'profile',
                component: _profile_profile_component__WEBPACK_IMPORTED_MODULE_16__["ProfileComponent"]
            },
            {
                path: 'feedback',
                component: _feedback_feedback_component__WEBPACK_IMPORTED_MODULE_17__["FeedbackComponent"]
            },
        ]
    }
];


/***/ }),

/***/ "./src/app/core/admin/dashboard/dashboard.component.scss":
/*!***************************************************************!*\
  !*** ./src/app/core/admin/dashboard/dashboard.component.scss ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vZGFzaGJvYXJkL2Rhc2hib2FyZC5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/core/admin/dashboard/dashboard.component.ts":
/*!*************************************************************!*\
  !*** ./src/app/core/admin/dashboard/dashboard.component.ts ***!
  \*************************************************************/
/*! exports provided: DashboardComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DashboardComponent", function() { return DashboardComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm5/common.js");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");



// amCharts imports



var DashboardComponent = /** @class */ (function () {
    function DashboardComponent(platformId, zone) {
        this.platformId = platformId;
        this.zone = zone;
    }
    // Run the function only in the browser
    DashboardComponent.prototype.browserOnly = function (f) {
        if (Object(_angular_common__WEBPACK_IMPORTED_MODULE_2__["isPlatformBrowser"])(this.platformId)) {
            this.zone.runOutsideAngular(function () {
                f();
            });
        }
    };
    DashboardComponent.prototype.ngAfterViewInit = function () {
        // Chart code goes in here
        this.browserOnly(function () {
            _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_5__["default"]);
            //Chart 1 ------------------------>
            var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
            // Add data
            chart.data = [
                {
                    agency: "BPM",
                    metadata: 125,
                },
                {
                    agency: "BPB",
                    metadata: 80,
                },
                {
                    agency: "BUP",
                    metadata: 65,
                },
                {
                    agency: "BPP",
                    metadata: 70,
                },
                {
                    agency: "BG",
                    metadata: 30,
                },
            ];
            // Create axes
            var categoryAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["CategoryAxis"]());
            categoryAxis.dataFields.category = "agency";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 70;
            categoryAxis.title.text = "[bold grey] Bahagian";
            var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "[bold grey] Jumlah Metadata";
            // Create series
            var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ColumnSeries"]());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "metadata";
            series.dataFields.categoryX = "agency";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            // on hover, make corner radiuses bigger
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            // Cursor
            chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
            //Chart 2 ----------------------------->
            // Create chart instance
            var chart2 = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv2", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
            // Add data
            chart2.data = [
                {
                    agency: "A",
                    metadata: 3025,
                },
                {
                    agency: "B",
                    metadata: 1382,
                },
                {
                    agency: "C",
                    metadata: 925,
                },
                {
                    agency: "D",
                    metadata: 1282,
                },
                {
                    agency: "E",
                    metadata: 825,
                },
                {
                    agency: "F",
                    metadata: 1882,
                },
            ];
            // Create axes
            var categoryAxis2 = chart2.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["CategoryAxis"]());
            categoryAxis2.dataFields.category = "agency";
            categoryAxis2.renderer.grid.template.location = 0;
            categoryAxis2.renderer.minGridDistance = 30;
            categoryAxis2.renderer.labels.template.horizontalCenter = "right";
            categoryAxis2.renderer.labels.template.verticalCenter = "middle";
            categoryAxis2.renderer.labels.template.rotation = 270;
            categoryAxis2.tooltip.disabled = true;
            categoryAxis2.renderer.minHeight = 70;
            categoryAxis2.title.text = "[bold grey]Agensi";
            var valueAxis2 = chart2.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
            valueAxis2.renderer.minWidth = 50;
            valueAxis2.title.text = "[bold grey] Jumlah Metadata";
            // Create series
            var series2 = chart2.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ColumnSeries"]());
            series2.sequencedInterpolation = true;
            series2.dataFields.valueY = "metadata";
            series2.dataFields.categoryX = "agency";
            series2.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series2.columns.template.strokeWidth = 0;
            series2.columns.template.width = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["percent"](50);
            series2.tooltip.pointerOrientation = "vertical";
            series2.columns.template.column.cornerRadiusTopLeft = 10;
            series2.columns.template.column.cornerRadiusTopRight = 10;
            series2.columns.template.column.fillOpacity = 0.8;
            // on hover, make corner radiuses bigger
            var hoverState2 = series2.columns.template.column.states.create("hover");
            hoverState2.properties.cornerRadiusTopLeft = 0;
            hoverState2.properties.cornerRadiusTopRight = 0;
            hoverState2.properties.fillOpacity = 1;
            series2.columns.template.adapter.add("fill", function (fill, target) {
                return chart2.colors.getIndex(target.dataItem.index);
            });
            // Cursor
            chart2.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
            //Chart 3 ----------------------------->
            // Create chart instance
            var chart3 = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv3", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
            // Add data
            chart3.data = [
                {
                    tahun: "2010",
                    metadata: 3035,
                },
                {
                    tahun: "2011",
                    metadata: 1383,
                },
                {
                    tahun: "2012",
                    metadata: 935,
                },
                {
                    tahun: "2013",
                    metadata: 1383,
                },
                {
                    tahun: "2014",
                    metadata: 835,
                },
                {
                    tahun: "2015",
                    metadata: 1883,
                },
                {
                    tahun: "2016",
                    metadata: 1203,
                },
                {
                    tahun: "2017",
                    metadata: 1383,
                },
                {
                    tahun: "2018",
                    metadata: 983,
                },
                {
                    tahun: "2019",
                    metadata: 1883,
                },
                {
                    tahun: "2020",
                    metadata: 1583,
                },
            ];
            // Create axes
            var categoryAxis3 = chart3.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["CategoryAxis"]());
            categoryAxis3.dataFields.category = "tahun";
            categoryAxis3.renderer.grid.template.location = 0;
            categoryAxis3.renderer.minGridDistance = 30;
            categoryAxis3.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis3.renderer.labels.template.verticalCenter = "middle";
            categoryAxis3.renderer.labels.template.rotation = 0;
            categoryAxis3.tooltip.disabled = true;
            categoryAxis3.renderer.minHeight = 70;
            categoryAxis3.title.text = "[bold grey]Agensi";
            var valueAxis3 = chart3.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
            valueAxis3.renderer.minWidth = 50;
            valueAxis3.title.text = "[bold grey] Jumlah Metadata";
            // Create series
            var series3 = chart3.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ColumnSeries"]());
            series3.sequencedInterpolation = true;
            series3.dataFields.valueY = "metadata";
            series3.dataFields.categoryX = "tahun";
            series3.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series3.columns.template.strokeWidth = 0;
            series3.columns.template.width = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["percent"](15);
            series3.tooltip.pointerOrientation = "vertical";
            series3.columns.template.column.cornerRadiusTopLeft = 10;
            series3.columns.template.column.cornerRadiusTopRight = 10;
            series3.columns.template.column.fillOpacity = 0.8;
            // on hover, make corner radiuses bigger
            var hoverState3 = series3.columns.template.column.states.create("hover");
            hoverState3.properties.cornerRadiusTopLeft = 0;
            hoverState3.properties.cornerRadiusTopRight = 0;
            hoverState3.properties.fillOpacity = 1;
            series3.columns.template.adapter.add("fill", function (fill, target) {
                return chart3.colors.getIndex(target.dataItem.index);
            });
            // Cursor
            chart3.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
            //Chart 4 ----------------------------->
            // Create chart instance
            var chart4 = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv4", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
            // Add data
            chart4.data = [
                {
                    tahun: "2010",
                    metadata: 3035,
                },
                {
                    tahun: "2011",
                    metadata: 1383,
                },
                {
                    tahun: "2012",
                    metadata: 935,
                },
                {
                    tahun: "2013",
                    metadata: 1383,
                },
                {
                    tahun: "2014",
                    metadata: 835,
                },
                {
                    tahun: "2015",
                    metadata: 1883,
                },
                {
                    tahun: "2016",
                    metadata: 1203,
                },
                {
                    tahun: "2017",
                    metadata: 1383,
                },
                {
                    tahun: "2018",
                    metadata: 983,
                },
                {
                    tahun: "2019",
                    metadata: 1883,
                },
                {
                    tahun: "2020",
                    metadata: 1583,
                },
            ];
            // Create axes
            var categoryAxis4 = chart4.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["CategoryAxis"]());
            categoryAxis4.dataFields.category = "tahun";
            categoryAxis4.renderer.grid.template.location = 0;
            categoryAxis4.renderer.minGridDistance = 30;
            categoryAxis4.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis4.renderer.labels.template.verticalCenter = "middle";
            categoryAxis4.renderer.labels.template.rotation = 0;
            categoryAxis4.tooltip.disabled = true;
            categoryAxis4.renderer.minHeight = 70;
            categoryAxis4.title.text = "[bold grey]Agensi";
            var valueAxis4 = chart4.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
            valueAxis4.renderer.minWidth = 50;
            valueAxis4.title.text = "[bold grey] Jumlah Metadata";
            // Create series
            var series4 = chart4.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ColumnSeries"]());
            series4.sequencedInterpolation = true;
            series4.dataFields.valueY = "metadata";
            series4.dataFields.categoryX = "tahun";
            series4.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series4.columns.template.strokeWidth = 0;
            series4.columns.template.width = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["percent"](15);
            series4.tooltip.pointerOrientation = "vertical";
            series4.columns.template.column.cornerRadiusTopLeft = 10;
            series4.columns.template.column.cornerRadiusTopRight = 10;
            series4.columns.template.column.fillOpacity = 0.8;
            // on hover, make corner radiuses bigger
            var hoverState4 = series4.columns.template.column.states.create("hover");
            hoverState4.properties.cornerRadiusTopLeft = 0;
            hoverState4.properties.cornerRadiusTopRight = 0;
            hoverState4.properties.fillOpacity = 1;
            series4.columns.template.adapter.add("fill", function (fill, target) {
                return chart4.colors.getIndex(target.dataItem.index);
            });
            // Cursor
            chart4.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
        });
        //PieChart1 --------------------------->
        // Create chart instance
        var piechart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("piechartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["PieChart"]);
        // Add data
        piechart.data = [
            {
                category: "Imagery Base Maps-Earth Cover",
                metadata: 501.9,
            },
            {
                category: "Geoscientific Information",
                metadata: 301.9,
            },
            {
                category: "Transportation",
                metadata: 201.1,
            },
            {
                category: "Inland Waters",
                metadata: 165.8,
            },
            {
                category: "Climatology Meteorology Atmosphere",
                metadata: 139.9,
            },
        ];
        // Add and configure Series
        var pieSeries = piechart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["PieSeries"]());
        pieSeries.dataFields.value = "metadata";
        pieSeries.dataFields.category = "category";
        pieSeries.slices.template.stroke = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["color"]("#fff");
        pieSeries.slices.template.strokeOpacity = 1;
        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;
        piechart.hiddenState.properties.radius = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["percent"](0);
        //PieChart2 --------------------------->
        // Create chart instance
        var piechart2 = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("piechartdiv2", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["PieChart"]);
        // Add data
        piechart2.data = [
            {
                category: "Aeronautical",
                metadata: 401.9,
            },
            {
                category: "Demarcation",
                metadata: 309.3,
            },
            {
                category: "Built Enviroment",
                metadata: 201.1,
            },
            {
                category: "Hydrography",
                metadata: 115.8,
            },
            {
                category: "General",
                metadata: 139.9,
            },
        ];
        // Add and configure Series
        var pieSeries2 = piechart2.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["PieSeries"]());
        pieSeries2.dataFields.value = "metadata";
        pieSeries2.dataFields.category = "category";
        pieSeries2.slices.template.stroke = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["color"]("#fff");
        pieSeries2.slices.template.strokeOpacity = 1;
        // This creates initial animation
        pieSeries2.hiddenState.properties.opacity = 1;
        pieSeries2.hiddenState.properties.endAngle = -90;
        pieSeries2.hiddenState.properties.startAngle = -90;
        piechart2.hiddenState.properties.radius = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["percent"](0);
    };
    DashboardComponent.prototype.ngOnDestroy = function () {
        var _this = this;
        // Clean up chart when the component is removed
        this.browserOnly(function () {
            if (_this.chart) {
                _this.chart.dispose();
            }
        });
    };
    DashboardComponent.ctorParameters = function () { return [
        { type: undefined, decorators: [{ type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["Inject"], args: [_angular_core__WEBPACK_IMPORTED_MODULE_1__["PLATFORM_ID"],] }] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    DashboardComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-dashboard",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./dashboard.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/dashboard/dashboard.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./dashboard.component.scss */ "./src/app/core/admin/dashboard/dashboard.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__param"])(0, Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Inject"])(_angular_core__WEBPACK_IMPORTED_MODULE_1__["PLATFORM_ID"])),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [Object, _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], DashboardComponent);
    return DashboardComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/datatable/datatable.component.scss":
/*!***************************************************************!*\
  !*** ./src/app/core/admin/datatable/datatable.component.scss ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vZGF0YXRhYmxlL2RhdGF0YWJsZS5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/core/admin/datatable/datatable.component.ts":
/*!*************************************************************!*\
  !*** ./src/app/core/admin/datatable/datatable.component.ts ***!
  \*************************************************************/
/*! exports provided: SelectionType, DatatableComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DatatableComponent", function() { return DatatableComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");






_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_4__["default"]);


var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var DatatableComponent = /** @class */ (function () {
    function DatatableComponent(mockService, modalService, formBuilder, zone) {
        this.mockService = mockService;
        this.modalService = modalService;
        this.formBuilder = formBuilder;
        this.zone = zone;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Dataset",
                status: "61",
                tindakan: "Semak"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Dataset",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Dataset",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Imagery",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Imagery",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Imagery",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
            {
                metadata: "Peta Pemetaan Utiliti Putrajaya AU1302521 ",
                kategori: "Gridded",
                status: "61"
            },
        ];
        this.SelectionType = SelectionType;
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    DatatableComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    DatatableComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    DatatableComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    DatatableComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    DatatableComponent.prototype.ngOnInit = function () {
        this.registerForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].email
            ]))
        });
    };
    DatatableComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    DatatableComponent.prototype.closeModal = function () {
        this.modal.hide();
        this.registerForm.reset();
    };
    DatatableComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a.fire({
            title: "Confirmation",
            text: "Are you sure to create this new user?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Confirm",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Cancel"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    DatatableComponent.prototype.deleteData = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang metadata ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    DatatableComponent.prototype.success = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a.fire({
            title: "Berjaya",
            text: "Metadata telah dibuang!",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    DatatableComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["BsModalService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormBuilder"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    DatatableComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-datatable',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./datatable.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/datatable/datatable.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./datatable.component.scss */ "./src/app/core/admin/datatable/datatable.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["BsModalService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormBuilder"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], DatatableComponent);
    return DatatableComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/feedback/feedback.component.scss":
/*!*************************************************************!*\
  !*** ./src/app/core/admin/feedback/feedback.component.scss ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.bg-custom {\n  background-color: #FFAD29 !important;\n}\n\n::ng-deep .ql-editor {\n  height: 200px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vZmVlZGJhY2svZmVlZGJhY2suY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vZmVlZGJhY2svZmVlZGJhY2suY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBRENBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNFSjs7QURLQTtFQUNJLGlCQUFBO0FDRko7O0FES0E7RUFDSSxvQ0FBQTtBQ0ZKOztBREtBO0VBQ0ksYUFBQTtBQ0ZKIiwiZmlsZSI6InNyYy9hcHAvY29yZS9hZG1pbi9mZWVkYmFjay9mZWVkYmFjay5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuLy8gOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4vLyAgICAgbWF4LWhlaWdodDogNDB2aCAhaW1wb3J0YW50O1xuLy8gICAgIG92ZXJmbG93LXk6IGF1dG87XG4vLyB9XG5cbi5jYXJkIHtcbiAgICBtaW4taGVpZ2h0OiA2ODBweDtcbn1cblxuLmJnLWN1c3RvbSB7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogI0ZGQUQyOSAhaW1wb3J0YW50O1xufVxuXG46Om5nLWRlZXAgLnFsLWVkaXRvciB7XG4gICAgaGVpZ2h0OiAyMDBweDtcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5jYXJkIHtcbiAgbWluLWhlaWdodDogNjgwcHg7XG59XG5cbi5iZy1jdXN0b20ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkZBRDI5ICFpbXBvcnRhbnQ7XG59XG5cbjo6bmctZGVlcCAucWwtZWRpdG9yIHtcbiAgaGVpZ2h0OiAyMDBweDtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/core/admin/feedback/feedback.component.ts":
/*!***********************************************************!*\
  !*** ./src/app/core/admin/feedback/feedback.component.ts ***!
  \***********************************************************/
/*! exports provided: SelectionType, FeedbackComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FeedbackComponent", function() { return FeedbackComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");





var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var FeedbackComponent = /** @class */ (function () {
    function FeedbackComponent(formBuilder, modalService) {
        this.formBuilder = formBuilder;
        this.modalService = modalService;
        // Toggle
        this.editEnabled = false;
        this.formDataset = false;
        this.editFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.entries = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                tajuk: "Apa itu MyGeo Explorer? ",
                kategori: "#####",
                emel: "abcde@gmail.com"
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
                kategori: "#####",
                emel: "abcde@gmail.com"
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
                kategori: "#####",
                emel: "abcde@gmail.com"
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
                kategori: "#####",
                emel: "abcde@gmail.com"
            }
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    FeedbackComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    FeedbackComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    FeedbackComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    FeedbackComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    FeedbackComponent.prototype.ngOnInit = function () {
        this.editForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    FeedbackComponent.prototype.toggleEdit = function () {
        this.editEnabled = !this.editEnabled;
    };
    FeedbackComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menghantar maklum balas ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    FeedbackComponent.prototype.confirmSave = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
                _this.toggleEdit();
            }
        });
    };
    FeedbackComponent.prototype.confirmPassword = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk tukar laluan?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    FeedbackComponent.prototype.edit = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Maklum balas telah berjaya dihantar",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.editForm.reset();
            }
        });
    };
    FeedbackComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    FeedbackComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    FeedbackComponent.ctorParameters = function () { return [
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"] }
    ]; };
    FeedbackComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-feedback',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./feedback.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/feedback/feedback.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./feedback.component.scss */ "./src/app/core/admin/feedback/feedback.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"]])
    ], FeedbackComponent);
    return FeedbackComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-annoucement/management-annoucement.component.scss":
/*!*****************************************************************************************!*\
  !*** ./src/app/core/admin/management-annoucement/management-annoucement.component.scss ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable .datatable-body {\n  max-height: 40vh !important;\n  overflow-y: scroll;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.bg-custom {\n  background-color: #FFAD29 !important;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1hbm5vdWNlbWVudC9tYW5hZ2VtZW50LWFubm91Y2VtZW50LmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtYW5ub3VjZW1lbnQvbWFuYWdlbWVudC1hbm5vdWNlbWVudC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7RUFFSSxvQ0FBQTtFQUNBLHFCQUFBO0FDQ0o7O0FEQ0E7RUFDSSxjQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtBQ0VKOztBREFBO0VBQ0ksMkJBQUE7RUFDQSxrQkFBQTtBQ0dKOztBREFBO0VBQ0ksaUJBQUE7QUNHSjs7QURBQTtFQUNJLG9DQUFBO0FDR0oiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtYW5ub3VjZW1lbnQvbWFuYWdlbWVudC1hbm5vdWNlbWVudC5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4gICAgbWF4LWhlaWdodDogNDB2aCAhaW1wb3J0YW50O1xuICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uYmctY3VzdG9tIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkZBRDI5ICFpbXBvcnRhbnQ7XG59IiwiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gIGJvcmRlci1jb2xvcjogIzBBODBCNjtcbn1cblxuLmVycm9yLW1lc3NhZ2Uge1xuICBjb2xvcjogI2Y1MzY1YztcbiAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gIGZvbnQtc2l6ZTogMC44ZW07XG4gIHBhZGRpbmctdG9wOiA1cHg7XG4gIHBhZGRpbmctYm90dG9tOiAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG46Om5nLWRlZXAgLm5neC1kYXRhdGFibGUgLmRhdGF0YWJsZS1ib2R5IHtcbiAgbWF4LWhlaWdodDogNDB2aCAhaW1wb3J0YW50O1xuICBvdmVyZmxvdy15OiBzY3JvbGw7XG59XG5cbi5jYXJkIHtcbiAgbWluLWhlaWdodDogNjgwcHg7XG59XG5cbi5iZy1jdXN0b20ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkZBRDI5ICFpbXBvcnRhbnQ7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-annoucement/management-annoucement.component.ts":
/*!***************************************************************************************!*\
  !*** ./src/app/core/admin/management-annoucement/management-annoucement.component.ts ***!
  \***************************************************************************************/
/*! exports provided: SelectionType, ManagementAnnoucementComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementAnnoucementComponent", function() { return ManagementAnnoucementComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");





var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementAnnoucementComponent = /** @class */ (function () {
    function ManagementAnnoucementComponent(formBuilder, modalService) {
        this.formBuilder = formBuilder;
        this.modalService = modalService;
        // Toggle
        this.editEnabled = false;
        this.formDataset = false;
        this.editFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-md"
        };
        this.entries = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                tajuk: "Apa itu MyGeo Explorer? ",
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
            },
            {
                tajuk: "Apa itu MyGeo Explorer? ",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementAnnoucementComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementAnnoucementComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementAnnoucementComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementAnnoucementComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementAnnoucementComponent.prototype.ngOnInit = function () {
        this.editForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    ManagementAnnoucementComponent.prototype.toggleEdit = function () {
        this.editEnabled = !this.editEnabled;
    };
    ManagementAnnoucementComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menukar gambar profil ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementAnnoucementComponent.prototype.confirmSave = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
                _this.toggleEdit();
            }
        });
    };
    ManagementAnnoucementComponent.prototype.confirmPassword = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk tukar laluan?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementAnnoucementComponent.prototype.edit = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya disimpan",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.editForm.reset();
            }
        });
    };
    ManagementAnnoucementComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementAnnoucementComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ManagementAnnoucementComponent.ctorParameters = function () { return [
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"] }
    ]; };
    ManagementAnnoucementComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-annoucement',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-annoucement.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-annoucement/management-annoucement.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-annoucement.component.scss */ "./src/app/core/admin/management-annoucement/management-annoucement.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"]])
    ], ManagementAnnoucementComponent);
    return ManagementAnnoucementComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-appstatus/management-appstatus.component.scss":
/*!*************************************************************************************!*\
  !*** ./src/app/core/admin/management-appstatus/management-appstatus.component.scss ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1hcHBzdGF0dXMvbWFuYWdlbWVudC1hcHBzdGF0dXMuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1hcHBzdGF0dXMvbWFuYWdlbWVudC1hcHBzdGF0dXMuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBREVBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNDSjs7QURHSTtFQUNJLFdBQUE7QUNBUjs7QURJQTtFQUNJLGlCQUFBO0FDREo7O0FESUE7RUFDSSxjQUFBO0FDREoiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtYXBwc3RhdHVzL21hbmFnZW1lbnQtYXBwc3RhdHVzLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbjo6bmctZGVlcCAubmd4LWRhdGF0YWJsZSB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IGF1dG87XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-appstatus/management-appstatus.component.ts":
/*!***********************************************************************************!*\
  !*** ./src/app/core/admin/management-appstatus/management-appstatus.component.ts ***!
  \***********************************************************************************/
/*! exports provided: SelectionType, ManagementAppstatusComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementAppstatusComponent", function() { return ManagementAppstatusComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");



var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementAppstatusComponent = /** @class */ (function () {
    function ManagementAppstatusComponent(modalService) {
        this.modalService = modalService;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-xl"
        };
        this.entries = 5;
        this.entries2 = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                status: "Baru",
                download_st: "Selesai",
                valuation_st: "Tidak",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                status: "Dalam Proses",
                download_st: "Selesai",
                valuation_st: "Tidak",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                status: "Ditolak",
                download_st: "Selesai",
                valuation_st: "Selesai",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                status: "Baru",
                download_st: "Tidak",
                valuation_st: "Tidak",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                status: "Baru",
                download_st: "Tidak",
                valuation_st: "Selesai",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementAppstatusComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementAppstatusComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementAppstatusComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementAppstatusComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementAppstatusComponent.prototype.ngOnInit = function () { };
    ManagementAppstatusComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementAppstatusComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ManagementAppstatusComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    ManagementAppstatusComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-appstatus',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-appstatus.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-appstatus/management-appstatus.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-appstatus.component.scss */ "./src/app/core/admin/management-appstatus/management-appstatus.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], ManagementAppstatusComponent);
    return ManagementAppstatusComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-audit/management-audit.component.scss":
/*!*****************************************************************************!*\
  !*** ./src/app/core/admin/management-audit/management-audit.component.scss ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1hdWRpdC9tYW5hZ2VtZW50LWF1ZGl0LmNvbXBvbmVudC5zY3NzIn0= */");

/***/ }),

/***/ "./src/app/core/admin/management-audit/management-audit.component.ts":
/*!***************************************************************************!*\
  !*** ./src/app/core/admin/management-audit/management-audit.component.ts ***!
  \***************************************************************************/
/*! exports provided: SelectionType, ManagementAuditComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementAuditComponent", function() { return ManagementAuditComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");



// import { AuditData } from 'src/assets/mock/admin-audit/audit.data.json'




_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_6__["default"]);
var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementAuditComponent = /** @class */ (function () {
    function ManagementAuditComponent(mockService, zone) {
        this.mockService = mockService;
        this.zone = zone;
        this.chartJanPost = 0;
        this.chartJanGet = 0;
        this.chartJanUpdate = 0;
        this.chartJanDelete = 0;
        this.chartFebPost = 0;
        this.chartFebGet = 0;
        this.chartFebUpdate = 0;
        this.chartFebDelete = 0;
        this.chartMarchPost = 0;
        this.chartMarchGet = 0;
        this.chartMarchUpdate = 0;
        this.chartMarchDelete = 0;
        this.chartAprPost = 0;
        this.chartAprGet = 0;
        this.chartAprUpdate = 0;
        this.chartAprDelete = 0;
        this.chartMayPost = 0;
        this.chartMayGet = 0;
        this.chartMayUpdate = 0;
        this.chartMayDelete = 0;
        this.chartJunPost = 0;
        this.chartJunGet = 0;
        this.chartJunUpdate = 0;
        this.chartJunDelete = 0;
        this.chartJulPost = 0;
        this.chartJulGet = 0;
        this.chartJulUpdate = 0;
        this.chartJulDelete = 0;
        this.chartAugPost = 0;
        this.chartAugGet = 0;
        this.chartAugUpdate = 0;
        this.chartAugDelete = 0;
        this.chartSepPost = 0;
        this.chartSepGet = 0;
        this.chartSepUpdate = 0;
        this.chartSepDelete = 0;
        this.chartOctPost = 0;
        this.chartOctGet = 0;
        this.chartOctUpdate = 0;
        this.chartOctDelete = 0;
        this.chartNovPost = 0;
        this.chartNovGet = 0;
        this.chartNovUpdate = 0;
        this.chartNovDelete = 0;
        this.chartDecPost = 0;
        this.chartDecGet = 0;
        this.chartDecUpdate = 0;
        this.chartDecDelete = 0;
        // Table
        this.tableEntries = 5;
        this.tableSelected = [];
        this.tableTemp = [];
        this.tableRows = [];
        this.SelectionType = SelectionType;
        this.getData();
    }
    ManagementAuditComponent.prototype.ngOnInit = function () {
    };
    ManagementAuditComponent.prototype.ngOnDestroy = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            if (_this.chart) {
                _this.chart.dispose();
            }
        });
    };
    ManagementAuditComponent.prototype.getData = function () {
        var _this = this;
        this.mockService.getAll('admin-audit/audit.data.json').subscribe(function (res) {
            // Success
            _this.tableRows = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__spreadArrays"])(res);
            _this.tableTemp = _this.tableRows.map(function (prop, key) {
                return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
            });
            console.log('Svc: ', _this.tableTemp);
            _this.resetCharts();
            _this.calculateCharts();
        }, function () {
            // Unsuccess
        }, function () {
            // After
            _this.getChart();
        });
    };
    ManagementAuditComponent.prototype.entriesChange = function ($event) {
        this.tableEntries = $event.target.value;
    };
    ManagementAuditComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.tableTemp = this.tableRows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementAuditComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.tableSelected.splice(0, this.tableSelected.length);
        (_b = this.tableSelected).push.apply(_b, selected);
    };
    ManagementAuditComponent.prototype.onActivate = function (event) {
        this.tableActiveRow = event.row;
    };
    ManagementAuditComponent.prototype.getCharts = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            _this.getChart();
        });
    };
    ManagementAuditComponent.prototype.getChart = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["create"]('chartdiv', _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["XYChart"]);
        chart.colors.step = 2;
        chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["Legend"]();
        chart.legend.position = 'top';
        chart.legend.paddingBottom = 20;
        chart.legend.labels.template.maxWidth = 95;
        var xAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["CategoryAxis"]());
        xAxis.dataFields.category = 'category';
        xAxis.renderer.cellStartLocation = 0.1;
        xAxis.renderer.cellEndLocation = 0.9;
        xAxis.renderer.grid.template.location = 0;
        var yAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["ValueAxis"]());
        yAxis.min = 0;
        function createSeries(value, name) {
            var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["ColumnSeries"]());
            series.dataFields.valueY = value;
            series.dataFields.categoryX = 'category';
            series.name = name;
            series.events.on("hidden", arrangeColumns);
            series.events.on("shown", arrangeColumns);
            var bullet = series.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["LabelBullet"]());
            bullet.interactionsEnabled = false;
            bullet.dy = 30;
            bullet.label.text = '{valueY}';
            bullet.label.fill = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["color"]('#ffffff');
            return series;
        }
        chart.data = [
            {
                category: 'POST',
                jan: this.chartJanPost,
                feb: this.chartFebPost,
                march: this.chartMarchPost,
                apr: this.chartAprPost,
                may: this.chartMayPost,
                Jun: this.chartJunPost,
                jul: this.chartJulPost,
                aug: this.chartAugPost,
                sep: this.chartSepPost,
                oct: this.chartOctPost,
                nov: this.chartNovPost,
                dec: this.chartDecPost
            },
            {
                category: 'GET',
                jan: this.chartJanGet,
                feb: this.chartFebGet,
                march: this.chartMarchGet,
                apr: this.chartAprGet,
                may: this.chartMayGet,
                Jun: this.chartJunGet,
                jul: this.chartJulGet,
                aug: this.chartAugGet,
                sep: this.chartSepGet,
                oct: this.chartOctGet,
                nov: this.chartNovGet,
                dec: this.chartDecGet
            },
            {
                category: 'UPDATE',
                jan: this.chartJanUpdate,
                feb: this.chartFebUpdate,
                march: this.chartMarchUpdate,
                apr: this.chartAprUpdate,
                may: this.chartMayUpdate,
                Jun: this.chartJunUpdate,
                jul: this.chartJulUpdate,
                aug: this.chartAugUpdate,
                sep: this.chartSepUpdate,
                oct: this.chartOctUpdate,
                nov: this.chartNovUpdate,
                dec: this.chartDecUpdate
            },
            {
                category: 'DELETE',
                jan: this.chartJanDelete,
                feb: this.chartFebDelete,
                march: this.chartMarchDelete,
                apr: this.chartAprDelete,
                may: this.chartMayDelete,
                Jun: this.chartJunDelete,
                jul: this.chartJulDelete,
                aug: this.chartAugDelete,
                sep: this.chartSepDelete,
                oct: this.chartOctDelete,
                nov: this.chartNovDelete,
                dec: this.chartDecDelete
            }
        ];
        createSeries('jan', 'Jan');
        createSeries('feb', 'Feb');
        createSeries('march', 'March');
        createSeries('apr', 'Apr');
        createSeries('may', 'May');
        createSeries('Jun', 'Jun');
        createSeries('jul', 'Jul');
        createSeries('aug', 'Aug');
        createSeries('sep', 'Sep');
        createSeries('octove', 'Oct');
        createSeries('nov', 'Nov');
        createSeries('dec', 'Dec');
        function arrangeColumns() {
            var series = chart.series.getIndex(0);
            var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
            if (series.dataItems.length > 1) {
                var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                var delta_1 = ((x1 - x0) / chart.series.length) * w;
                if (_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["isNumber"](delta_1)) {
                    var middle_1 = chart.series.length / 2;
                    var newIndex_1 = 0;
                    chart.series.each(function (series) {
                        if (!series.isHidden && !series.isHiding) {
                            series.dummyData = newIndex_1;
                            newIndex_1++;
                        }
                        else {
                            series.dummyData = chart.series.indexOf(series);
                        }
                    });
                    var visibleCount = newIndex_1;
                    var newMiddle_1 = visibleCount / 2;
                    chart.series.each(function (series) {
                        var trueIndex = chart.series.indexOf(series);
                        var newIndex = series.dummyData;
                        var dx = (newIndex - trueIndex + middle_1 - newMiddle_1) * delta_1;
                        series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                        series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                    });
                }
            }
        }
        this.chart = chart;
    };
    ManagementAuditComponent.prototype.resetCharts = function () {
        this.chartJanPost = 0;
        this.chartJanGet = 0;
        this.chartJanUpdate = 0;
        this.chartJanDelete = 0;
        this.chartFebPost = 0;
        this.chartFebGet = 0;
        this.chartFebUpdate = 0;
        this.chartFebDelete = 0;
        this.chartMarchPost = 0;
        this.chartMarchGet = 0;
        this.chartMarchUpdate = 0;
        this.chartMarchDelete = 0;
        this.chartAprPost = 0;
        this.chartAprGet = 0;
        this.chartAprUpdate = 0;
        this.chartAprDelete = 0;
        this.chartMayPost = 0;
        this.chartMayGet = 0;
        this.chartMayUpdate = 0;
        this.chartMayDelete = 0;
        this.chartJunPost = 0;
        this.chartJunGet = 0;
        this.chartJunUpdate = 0;
        this.chartJunDelete = 0;
        this.chartJulPost = 0;
        this.chartJulGet = 0;
        this.chartJulUpdate = 0;
        this.chartJulDelete = 0;
        this.chartAugPost = 0;
        this.chartAugGet = 0;
        this.chartAugUpdate = 0;
        this.chartAugDelete = 0;
        this.chartSepPost = 0;
        this.chartSepGet = 0;
        this.chartSepUpdate = 0;
        this.chartSepDelete = 0;
        this.chartOctPost = 0;
        this.chartOctGet = 0;
        this.chartOctUpdate = 0;
        this.chartOctDelete = 0;
        this.chartNovPost = 0;
        this.chartNovGet = 0;
        this.chartNovUpdate = 0;
        this.chartNovDelete = 0;
        this.chartDecPost = 0;
        this.chartDecGet = 0;
        this.chartDecUpdate = 0;
        this.chartDecDelete = 0;
    };
    ManagementAuditComponent.prototype.calculateCharts = function () {
        var _this = this;
        this.tableRows.forEach(function (row) {
            var checkerType = row.action;
            var checkerDate = moment__WEBPACK_IMPORTED_MODULE_3__(row.created_at);
            var checkerDateMonth = checkerDate.month();
            console.log(checkerDateMonth);
            if (checkerDateMonth == 0) {
                if (checkerType == 'POST') {
                    _this.chartJanPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartJanGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartJanUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartJanDelete += 1;
                }
            }
            else if (checkerDateMonth == 1) {
                if (checkerType == 'POST') {
                    _this.chartFebPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartFebGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartFebUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartFebDelete += 1;
                }
            }
            else if (checkerDateMonth == 2) {
                if (checkerType == 'POST') {
                    _this.chartMarchPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartMarchGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartMarchUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartMarchDelete += 1;
                }
            }
            else if (checkerDateMonth == 3) {
                if (checkerType == 'POST') {
                    _this.chartAprPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartAprGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartAprUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartAprDelete += 1;
                }
            }
            else if (checkerDateMonth == 4) {
                if (checkerType == 'POST') {
                    _this.chartMayPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartMayGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartMayUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartMayDelete += 1;
                }
            }
            else if (checkerDateMonth == 5) {
                if (checkerType == 'POST') {
                    _this.chartJunPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartJunGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartJunUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartJunDelete += 1;
                }
            }
            else if (checkerDateMonth == 6) {
                if (checkerType == 'POST') {
                    _this.chartJulPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartJulGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartJulUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartJulDelete += 1;
                }
            }
            else if (checkerDateMonth == 7) {
                if (checkerType == 'POST') {
                    _this.chartAugPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartAugGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartAugUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartAugDelete += 1;
                }
            }
            else if (checkerDateMonth == 8) {
                if (checkerType == 'POST') {
                    _this.chartSepPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartSepGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartSepUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartSepDelete += 1;
                }
            }
            else if (checkerDateMonth == 9) {
                if (checkerType == 'POST') {
                    _this.chartOctPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartOctGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartOctUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartOctDelete += 1;
                }
            }
            else if (checkerDateMonth == 10) {
                if (checkerType == 'POST') {
                    _this.chartNovPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartNovGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartNovUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartNovDelete += 1;
                }
            }
            else if (checkerDateMonth == 11) {
                if (checkerType == 'POST') {
                    _this.chartDecPost += 1;
                }
                else if (checkerType == 'GET') {
                    _this.chartDecGet += 1;
                }
                else if (checkerType == 'UPDATE') {
                    _this.chartDecUpdate += 1;
                }
                else if (checkerType == 'DELETE') {
                    _this.chartDecDelete += 1;
                }
            }
        });
    };
    ManagementAuditComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    ManagementAuditComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-audit',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-audit.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-audit/management-audit.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-audit.component.scss */ "./src/app/core/admin/management-audit/management-audit.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], ManagementAuditComponent);
    return ManagementAuditComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.scss":
/*!*************************************************************************************************!*\
  !*** ./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.scss ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1lbGVtZW50bWV0YWRhdGEvbWFuYWdlbWVudC1lbGVtZW50bWV0YWRhdGEuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1lbGVtZW50bWV0YWRhdGEvbWFuYWdlbWVudC1lbGVtZW50bWV0YWRhdGEuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBREVBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNDSjs7QURHSTtFQUNJLFdBQUE7QUNBUjs7QURJQTtFQUNJLGlCQUFBO0FDREo7O0FESUE7RUFDSSxjQUFBO0FDREoiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtZWxlbWVudG1ldGFkYXRhL21hbmFnZW1lbnQtZWxlbWVudG1ldGFkYXRhLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbjo6bmctZGVlcCAubmd4LWRhdGF0YWJsZSB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IGF1dG87XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.ts":
/*!***********************************************************************************************!*\
  !*** ./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.ts ***!
  \***********************************************************************************************/
/*! exports provided: SelectionType, ManagementElementmetadataComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementElementmetadataComponent", function() { return ManagementElementmetadataComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");






_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_4__["default"]);


var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementElementmetadataComponent = /** @class */ (function () {
    function ManagementElementmetadataComponent(mockService, modalService, formBuilder, zone) {
        this.mockService = mockService;
        this.modalService = modalService;
        this.formBuilder = formBuilder;
        this.zone = zone;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg",
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                label: "A",
                tajuk: "General Information",
                subtajuk: "Metadata Publisher",
                elemen: "Telephone",
                kategori: "Dataset",
            },
            {
                label: "A",
                tajuk: "General Information",
                subtajuk: "Metadata Publisher",
                elemen: "Email",
                kategori: "Dataset",
            },
            {
                label: "A",
                tajuk: "General Information",
                subtajuk: "-",
                elemen: "Content Information",
                kategori: "Dataset",
            },
        ];
        this.SelectionType = SelectionType;
        this.registerFormMessages = {
            name: [{ type: "required", message: "Name is required" }],
            email: [
                { type: "required", message: "Email is required" },
                { type: "email", message: "A valid email is required" },
            ],
        };
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementElementmetadataComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementElementmetadataComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementElementmetadataComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementElementmetadataComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementElementmetadataComponent.prototype.ngOnInit = function () {
        this.registerForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormControl"]("", _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].compose([_angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].required])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormControl"]("", _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].compose([_angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].required, _angular_forms__WEBPACK_IMPORTED_MODULE_7__["Validators"].email])),
        });
    };
    ManagementElementmetadataComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementElementmetadataComponent.prototype.closeModal = function () {
        this.modal.hide();
        this.registerForm.reset();
    };
    ManagementElementmetadataComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a
            .fire({
            title: "Pengesahan",
            text: "Anda pasti untuk menambah maklumat ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal",
        })
            .then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    ManagementElementmetadataComponent.prototype.deleteData = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a
            .fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang metadata ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal",
        })
            .then(function (result) {
            if (result.value) {
                sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a
                    .fire({
                    title: "Berjaya",
                    text: "Maklumat telah dibuang!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1700,
                })
                    .then(function (result) {
                    if (result.value) {
                        _this.modal.hide();
                        _this.registerForm.reset();
                    }
                });
            }
        });
    };
    ManagementElementmetadataComponent.prototype.success = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_6___default.a
            .fire({
            title: "Berjaya",
            text: "Maklumat telah dikemaskini!",
            type: "success",
            showConfirmButton: false,
            timer: 1700,
        })
            .then(function (result) {
            _this.modal.hide();
            _this.registerForm.reset();
        });
    };
    ManagementElementmetadataComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["BsModalService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormBuilder"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    ManagementElementmetadataComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: "app-management-elementmetadata",
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-elementmetadata.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-elementmetadata.component.scss */ "./src/app/core/admin/management-elementmetadata/management-elementmetadata.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_5__["BsModalService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_7__["FormBuilder"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], ManagementElementmetadataComponent);
    return ManagementElementmetadataComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-faq/management-faq.component.scss":
/*!*************************************************************************!*\
  !*** ./src/app/core/admin/management-faq/management-faq.component.scss ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable .datatable-body {\n  max-height: 45vh !important;\n  overflow-y: scroll;\n}\n\n.card {\n  min-height: 680px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1mYXEvbWFuYWdlbWVudC1mYXEuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1mYXEvbWFuYWdlbWVudC1mYXEuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBRENBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNFSjs7QURBQTtFQUNJLDJCQUFBO0VBQ0Esa0JBQUE7QUNHSjs7QURBQTtFQUNJLGlCQUFBO0FDR0oiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtZmFxL21hbmFnZW1lbnQtZmFxLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG4uZXJyb3ItbWVzc2FnZSB7XG4gICAgY29sb3I6ICNmNTM2NWM7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gICAgZm9udC1zaXplOiAwLjhlbTtcbiAgICBwYWRkaW5nLXRvcDogNXB4O1xuICAgIHBhZGRpbmctYm90dG9tOiAwO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG59XG46Om5nLWRlZXAgLm5neC1kYXRhdGFibGUgLmRhdGF0YWJsZS1ib2R5IHtcbiAgICBtYXgtaGVpZ2h0OiA0NXZoICFpbXBvcnRhbnQ7XG4gICAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4uY2FyZCB7XG4gICAgbWluLWhlaWdodDogNjgwcHg7XG59IiwiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gIGJvcmRlci1jb2xvcjogIzBBODBCNjtcbn1cblxuLmVycm9yLW1lc3NhZ2Uge1xuICBjb2xvcjogI2Y1MzY1YztcbiAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gIGZvbnQtc2l6ZTogMC44ZW07XG4gIHBhZGRpbmctdG9wOiA1cHg7XG4gIHBhZGRpbmctYm90dG9tOiAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG46Om5nLWRlZXAgLm5neC1kYXRhdGFibGUgLmRhdGF0YWJsZS1ib2R5IHtcbiAgbWF4LWhlaWdodDogNDV2aCAhaW1wb3J0YW50O1xuICBvdmVyZmxvdy15OiBzY3JvbGw7XG59XG5cbi5jYXJkIHtcbiAgbWluLWhlaWdodDogNjgwcHg7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-faq/management-faq.component.ts":
/*!***********************************************************************!*\
  !*** ./src/app/core/admin/management-faq/management-faq.component.ts ***!
  \***********************************************************************/
/*! exports provided: SelectionType, ManagementFaqComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementFaqComponent", function() { return ManagementFaqComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");





var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementFaqComponent = /** @class */ (function () {
    function ManagementFaqComponent(formBuilder, modalService) {
        this.formBuilder = formBuilder;
        this.modalService = modalService;
        // Toggle
        this.editEnabled = false;
        this.formDataset = false;
        this.editFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.entries = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
            {
                soalan: "Apa itu MyGeo Explorer? ",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementFaqComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementFaqComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementFaqComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementFaqComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementFaqComponent.prototype.ngOnInit = function () {
        this.editForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    ManagementFaqComponent.prototype.toggleEdit = function () {
        this.editEnabled = !this.editEnabled;
    };
    ManagementFaqComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menukar gambar profil ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementFaqComponent.prototype.confirmSave = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
                _this.toggleEdit();
            }
        });
    };
    ManagementFaqComponent.prototype.confirmPassword = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk tukar laluan?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementFaqComponent.prototype.edit = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya disimpan",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.editForm.reset();
            }
        });
    };
    ManagementFaqComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementFaqComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ManagementFaqComponent.ctorParameters = function () { return [
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"] }
    ]; };
    ManagementFaqComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-faq',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-faq.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-faq/management-faq.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-faq.component.scss */ "./src/app/core/admin/management-faq/management-faq.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"]])
    ], ManagementFaqComponent);
    return ManagementFaqComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-newapp/management-newapp.component.scss":
/*!*******************************************************************************!*\
  !*** ./src/app/core/admin/management-newapp/management-newapp.component.scss ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1uZXdhcHAvbWFuYWdlbWVudC1uZXdhcHAuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1uZXdhcHAvbWFuYWdlbWVudC1uZXdhcHAuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBREVBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNDSjs7QURHSTtFQUNJLFdBQUE7QUNBUjs7QURJQTtFQUNJLGlCQUFBO0FDREo7O0FESUE7RUFDSSxjQUFBO0FDREoiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtbmV3YXBwL21hbmFnZW1lbnQtbmV3YXBwLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbjo6bmctZGVlcCAubmd4LWRhdGF0YWJsZSB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IGF1dG87XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-newapp/management-newapp.component.ts":
/*!*****************************************************************************!*\
  !*** ./src/app/core/admin/management-newapp/management-newapp.component.ts ***!
  \*****************************************************************************/
/*! exports provided: SelectionType, ManagementNewappComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementNewappComponent", function() { return ManagementNewappComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");


var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementNewappComponent = /** @class */ (function () {
    function ManagementNewappComponent() {
        // Toggle
        this.checkEnabled = false;
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementNewappComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementNewappComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementNewappComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementNewappComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementNewappComponent.prototype.displayCheck = function () {
        this.checkEnabled = !this.checkEnabled;
    };
    ManagementNewappComponent.prototype.ngOnInit = function () { };
    ManagementNewappComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-newapp',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-newapp.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-newapp/management-newapp.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-newapp.component.scss */ "./src/app/core/admin/management-newapp/management-newapp.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [])
    ], ManagementNewappComponent);
    return ManagementNewappComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-processdata/management-processdata.component.scss":
/*!*****************************************************************************************!*\
  !*** ./src/app/core/admin/management-processdata/management-processdata.component.scss ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1wcm9jZXNzZGF0YS9tYW5hZ2VtZW50LXByb2Nlc3NkYXRhLmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtcHJvY2Vzc2RhdGEvbWFuYWdlbWVudC1wcm9jZXNzZGF0YS5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7RUFFSSxvQ0FBQTtFQUNBLHFCQUFBO0FDQ0o7O0FERUE7RUFDSSxjQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtBQ0NKOztBREdJO0VBQ0ksV0FBQTtBQ0FSOztBRElBO0VBQ0ksaUJBQUE7QUNESjs7QURJQTtFQUNJLGNBQUE7QUNESiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC1wcm9jZXNzZGF0YS9tYW5hZ2VtZW50LXByb2Nlc3NkYXRhLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbjo6bmctZGVlcCAubmd4LWRhdGF0YWJsZSB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IGF1dG87XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-processdata/management-processdata.component.ts":
/*!***************************************************************************************!*\
  !*** ./src/app/core/admin/management-processdata/management-processdata.component.ts ***!
  \***************************************************************************************/
/*! exports provided: SelectionType, ManagementProcessdataComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementProcessdataComponent", function() { return ManagementProcessdataComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");



var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementProcessdataComponent = /** @class */ (function () {
    function ManagementProcessdataComponent(modalService) {
        this.modalService = modalService;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-xl"
        };
        this.entries = 5;
        this.entries2 = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementProcessdataComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementProcessdataComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementProcessdataComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementProcessdataComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementProcessdataComponent.prototype.ngOnInit = function () { };
    ManagementProcessdataComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementProcessdataComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ManagementProcessdataComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    ManagementProcessdataComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-processdata',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-processdata.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-processdata/management-processdata.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-processdata.component.scss */ "./src/app/core/admin/management-processdata/management-processdata.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], ManagementProcessdataComponent);
    return ManagementProcessdataComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-updatedata/class-category/class-category.component.scss":
/*!***********************************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/class-category/class-category.component.scss ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.upcase {\n  text-transform: uppercase;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2NsYXNzLWNhdGVnb3J5L2NsYXNzLWNhdGVnb3J5LmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtdXBkYXRlZGF0YS9jbGFzcy1jYXRlZ29yeS9jbGFzcy1jYXRlZ29yeS5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7RUFFSSxvQ0FBQTtFQUNBLHFCQUFBO0FDQ0o7O0FEQ0E7RUFDSSxjQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtBQ0VKOztBREtBO0VBQ0ksaUJBQUE7QUNGSjs7QURLQTtFQUNJLHlCQUFBO0FDRkoiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtdXBkYXRlZGF0YS9jbGFzcy1jYXRlZ29yeS9jbGFzcy1jYXRlZ29yeS5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuLy8gOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4vLyAgICAgbWF4LWhlaWdodDogNTB2aCAhaW1wb3J0YW50O1xuLy8gICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbi8vIH1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4udXBjYXNlIHtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xufSIsIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzBBODBCNiAhaW1wb3J0YW50O1xuICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmNhcmQge1xuICBtaW4taGVpZ2h0OiA2ODBweDtcbn1cblxuLnVwY2FzZSB7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-updatedata/class-category/class-category.component.ts":
/*!*********************************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/class-category/class-category.component.ts ***!
  \*********************************************************************************************/
/*! exports provided: SelectionType, ClassCategoryComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ClassCategoryComponent", function() { return ClassCategoryComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_3__);




var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ClassCategoryComponent = /** @class */ (function () {
    function ClassCategoryComponent(modalService) {
        this.modalService = modalService;
        // Toggle
        this.checkEnabled = false;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-md"
        };
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ClassCategoryComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ClassCategoryComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ClassCategoryComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ClassCategoryComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ClassCategoryComponent.prototype.displayCheck = function () {
        this.checkEnabled = !this.checkEnabled;
    };
    ClassCategoryComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ClassCategoryComponent.prototype.closeModal = function () {
        this.modal.hide();
        //this.registerForm.reset()
    };
    ClassCategoryComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk simpan aktiviti ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    ClassCategoryComponent.prototype.deleteData = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang data ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    ClassCategoryComponent.prototype.success = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya!",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    ClassCategoryComponent.prototype.ngOnInit = function () { };
    ClassCategoryComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    ClassCategoryComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-class-category',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./class-category.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-category/class-category.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./class-category.component.scss */ "./src/app/core/admin/management-updatedata/class-category/class-category.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], ClassCategoryComponent);
    return ClassCategoryComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.scss":
/*!*********************************************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.scss ***!
  \*********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.upcase {\n  text-transform: uppercase;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2NsYXNzLXNoYXJlY2F0ZWdvcnkvY2xhc3Mtc2hhcmVjYXRlZ29yeS5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvY29yZS9hZG1pbi9tYW5hZ2VtZW50LXVwZGF0ZWRhdGEvY2xhc3Mtc2hhcmVjYXRlZ29yeS9jbGFzcy1zaGFyZWNhdGVnb3J5LmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOztFQUVJLG9DQUFBO0VBQ0EscUJBQUE7QUNDSjs7QURDQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDRUo7O0FES0E7RUFDSSxpQkFBQTtBQ0ZKOztBREtBO0VBQ0kseUJBQUE7QUNGSiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2NsYXNzLXNoYXJlY2F0ZWdvcnkvY2xhc3Mtc2hhcmVjYXRlZ29yeS5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuLy8gOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4vLyAgICAgbWF4LWhlaWdodDogNTB2aCAhaW1wb3J0YW50O1xuLy8gICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbi8vIH1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4udXBjYXNlIHtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xufSIsIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzBBODBCNiAhaW1wb3J0YW50O1xuICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmNhcmQge1xuICBtaW4taGVpZ2h0OiA2ODBweDtcbn1cblxuLnVwY2FzZSB7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.ts":
/*!*******************************************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.ts ***!
  \*******************************************************************************************************/
/*! exports provided: SelectionType, ClassSharecategoryComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ClassSharecategoryComponent", function() { return ClassSharecategoryComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_3__);




var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ClassSharecategoryComponent = /** @class */ (function () {
    function ClassSharecategoryComponent(modalService) {
        this.modalService = modalService;
        // Toggle
        this.checkEnabled = false;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-md"
        };
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                category: "G2G",
                subcategory: "Agensi Persekutuan/ Agensi Negeri",
                status: "Aktif"
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ClassSharecategoryComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ClassSharecategoryComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ClassSharecategoryComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ClassSharecategoryComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ClassSharecategoryComponent.prototype.displayCheck = function () {
        this.checkEnabled = !this.checkEnabled;
    };
    ClassSharecategoryComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ClassSharecategoryComponent.prototype.closeModal = function () {
        this.modal.hide();
        //this.registerForm.reset()
    };
    ClassSharecategoryComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk simpan aktiviti ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    ClassSharecategoryComponent.prototype.deleteData = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang data ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    ClassSharecategoryComponent.prototype.success = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya!",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    ClassSharecategoryComponent.prototype.ngOnInit = function () { };
    ClassSharecategoryComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    ClassSharecategoryComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-class-sharecategory',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./class-sharecategory.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./class-sharecategory.component.scss */ "./src/app/core/admin/management-updatedata/class-sharecategory/class-sharecategory.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], ClassSharecategoryComponent);
    return ClassSharecategoryComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-updatedata/datalist/datalist.component.scss":
/*!***********************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/datalist/datalist.component.scss ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2RhdGFsaXN0L2RhdGFsaXN0LmNvbXBvbmVudC5zY3NzIiwic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtdXBkYXRlZGF0YS9kYXRhbGlzdC9kYXRhbGlzdC5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7RUFFSSxvQ0FBQTtFQUNBLHFCQUFBO0FDQ0o7O0FERUE7RUFDSSxjQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtFQUNBLGdCQUFBO0VBQ0EsaUJBQUE7RUFDQSxnQkFBQTtBQ0NKOztBREdJO0VBQ0ksV0FBQTtBQ0FSOztBRElBO0VBQ0ksaUJBQUE7QUNESjs7QURJQTtFQUNJLGNBQUE7QUNESiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2RhdGFsaXN0L2RhdGFsaXN0LmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn0iLCIuYnRuLXByaW1hcnksXG4uYmctcHJpbWFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuXG4uZXJyb3ItbWVzc2FnZSB7XG4gIGNvbG9yOiAjZjUzNjVjO1xuICB0ZXh0LWFsaWduOiByaWdodDtcbiAgZm9udC1zaXplOiAwLjhlbTtcbiAgcGFkZGluZy10b3A6IDVweDtcbiAgcGFkZGluZy1ib3R0b206IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbjo6bmctZGVlcCAubmd4LWRhdGF0YWJsZSB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IGF1dG87XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-updatedata/datalist/datalist.component.ts":
/*!*********************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/datalist/datalist.component.ts ***!
  \*********************************************************************************/
/*! exports provided: SelectionType, DatalistComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DatalistComponent", function() { return DatalistComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");



var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var DatalistComponent = /** @class */ (function () {
    function DatalistComponent(modalService) {
        this.modalService = modalService;
        // Toggle
        this.checkEnabled = false;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
            {
                category: "Aeronautical",
                subcategory: "Lapangan Terbang (Aerodrome-AB)",
                datalayer: "Transitional Surface",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    DatalistComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    DatalistComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    DatalistComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    DatalistComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    DatalistComponent.prototype.displayCheck = function () {
        this.checkEnabled = !this.checkEnabled;
    };
    DatalistComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    DatalistComponent.prototype.closeModal = function () {
        this.modal.hide();
        //this.registerForm.reset()
    };
    DatalistComponent.prototype.ngOnInit = function () { };
    DatalistComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    DatalistComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-datalist',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./datalist.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/datalist/datalist.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./datalist.component.scss */ "./src/app/core/admin/management-updatedata/datalist/datalist.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], DatalistComponent);
    return DatalistComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-updatedata/dataprice/dataprice.component.scss":
/*!*************************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/dataprice/dataprice.component.scss ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.upcase {\n  text-transform: uppercase;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2RhdGFwcmljZS9kYXRhcHJpY2UuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11cGRhdGVkYXRhL2RhdGFwcmljZS9kYXRhcHJpY2UuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBRENBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNFSjs7QURLQTtFQUNJLGlCQUFBO0FDRko7O0FES0E7RUFDSSx5QkFBQTtBQ0ZKIiwiZmlsZSI6InNyYy9hcHAvY29yZS9hZG1pbi9tYW5hZ2VtZW50LXVwZGF0ZWRhdGEvZGF0YXByaWNlL2RhdGFwcmljZS5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuLy8gOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4vLyAgICAgbWF4LWhlaWdodDogNTB2aCAhaW1wb3J0YW50O1xuLy8gICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbi8vIH1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4udXBjYXNlIHtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xufSIsIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzBBODBCNiAhaW1wb3J0YW50O1xuICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmNhcmQge1xuICBtaW4taGVpZ2h0OiA2ODBweDtcbn1cblxuLnVwY2FzZSB7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-updatedata/dataprice/dataprice.component.ts":
/*!***********************************************************************************!*\
  !*** ./src/app/core/admin/management-updatedata/dataprice/dataprice.component.ts ***!
  \***********************************************************************************/
/*! exports provided: SelectionType, DatapriceComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DatapriceComponent", function() { return DatapriceComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_3__);




var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var DatapriceComponent = /** @class */ (function () {
    function DatapriceComponent(modalService) {
        this.modalService = modalService;
        // Toggle
        this.checkEnabled = false;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-md"
        };
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.entries = 5;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                category: "G2G",
                subcategory: "Agensi Persekutuan/ Agensi Negeri",
                datalayer: "Inner Horizontal Surface",
                price_permb: "RM40"
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    DatapriceComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    DatapriceComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    DatapriceComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    DatapriceComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    DatapriceComponent.prototype.displayCheck = function () {
        this.checkEnabled = !this.checkEnabled;
    };
    DatapriceComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    DatapriceComponent.prototype.closeModal = function () {
        this.modal.hide();
        //this.registerForm.reset()
    };
    DatapriceComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk simpan aktiviti ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    DatapriceComponent.prototype.deleteData = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang data ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.success();
            }
        });
    };
    DatapriceComponent.prototype.success = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_3___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya!",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    DatapriceComponent.prototype.ngOnInit = function () { };
    DatapriceComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    DatapriceComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-dataprice',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./dataprice.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-updatedata/dataprice/dataprice.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./dataprice.component.scss */ "./src/app/core/admin/management-updatedata/dataprice/dataprice.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], DatapriceComponent);
    return DatapriceComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-user/management-user.component.scss":
/*!***************************************************************************!*\
  !*** ./src/app/core/admin/management-user/management-user.component.scss ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable .datatable-body {\n  max-height: 50vh !important;\n  overflow-y: scroll;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.upcase {\n  text-transform: uppercase;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11c2VyL21hbmFnZW1lbnQtdXNlci5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvY29yZS9hZG1pbi9tYW5hZ2VtZW50LXVzZXIvbWFuYWdlbWVudC11c2VyLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOztFQUVJLG9DQUFBO0VBQ0EscUJBQUE7QUNDSjs7QURDQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDRUo7O0FEQUE7RUFDSSwyQkFBQTtFQUNBLGtCQUFBO0FDR0o7O0FEQUE7RUFDSSxpQkFBQTtBQ0dKOztBREFBO0VBQ0kseUJBQUE7QUNHSiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11c2VyL21hbmFnZW1lbnQtdXNlci5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gICAgYm9yZGVyLWNvbG9yOiAjMEE4MEI2O1xufVxuLmVycm9yLW1lc3NhZ2Uge1xuICAgIGNvbG9yOiAjZjUzNjVjO1xuICAgIHRleHQtYWxpZ246IHJpZ2h0O1xuICAgIGZvbnQtc2l6ZTogMC44ZW07XG4gICAgcGFkZGluZy10b3A6IDVweDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgICBtYXJnaW4tYm90dG9tOiAwO1xufVxuOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4gICAgbWF4LWhlaWdodDogNTB2aCAhaW1wb3J0YW50O1xuICAgIG92ZXJmbG93LXk6IHNjcm9sbDtcbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4udXBjYXNlIHtcbiAgICB0ZXh0LXRyYW5zZm9ybTogdXBwZXJjYXNlO1xufSIsIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzBBODBCNiAhaW1wb3J0YW50O1xuICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIC5kYXRhdGFibGUtYm9keSB7XG4gIG1heC1oZWlnaHQ6IDUwdmggIWltcG9ydGFudDtcbiAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4uY2FyZCB7XG4gIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4udXBjYXNlIHtcbiAgdGV4dC10cmFuc2Zvcm06IHVwcGVyY2FzZTtcbn0iXX0= */");

/***/ }),

/***/ "./src/app/core/admin/management-user/management-user.component.ts":
/*!*************************************************************************!*\
  !*** ./src/app/core/admin/management-user/management-user.component.ts ***!
  \*************************************************************************/
/*! exports provided: SelectionType, ManagementUserComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementUserComponent", function() { return ManagementUserComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");








_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_6__["default"]);


var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementUserComponent = /** @class */ (function () {
    function ManagementUserComponent(mockService, modalService, formBuilder, zone) {
        this.mockService = mockService;
        this.modalService = modalService;
        this.formBuilder = formBuilder;
        this.zone = zone;
        // Toggle
        this.transEnabled = false;
        // Table
        this.tableEntries = 10;
        this.tableSelected = [];
        this.tableTemp = [];
        this.tableRows = [];
        this.SelectionType = SelectionType;
        this.chartJan = 0;
        this.chartFeb = 0;
        this.chartMar = 0;
        this.chartApr = 0;
        this.chartMay = 0;
        this.chartJun = 0;
        this.chartJul = 0;
        this.chartAug = 0;
        this.chartSep = 0;
        this.chartOct = 0;
        this.chartNov = 0;
        this.chartDec = 0;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.registerFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.getData();
    }
    ManagementUserComponent.prototype.ngOnInit = function () {
        this.registerForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_9__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_9__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_9__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_9__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_9__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_9__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_9__["Validators"].email
            ]))
        });
    };
    ManagementUserComponent.prototype.entriesChange = function ($event) {
        this.tableEntries = $event.target.value;
    };
    ManagementUserComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.tableTemp = this.tableRows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementUserComponent.prototype.onSelect = function (_a) {
        var _b;
        var tableSelected = _a.tableSelected;
        this.tableSelected.splice(0, this.tableSelected.length);
        (_b = this.tableSelected).push.apply(_b, tableSelected);
    };
    ManagementUserComponent.prototype.onActivate = function (event) {
        this.tableActiveRow = event.row;
    };
    ManagementUserComponent.prototype.ngOnDestroy = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            if (_this.chart) {
                _this.chart.dispose();
            }
        });
    };
    ManagementUserComponent.prototype.getData = function () {
        var _this = this;
        this.mockService.getAll('admin-user/users.data.json').subscribe(function (res) {
            // Success
            _this.tableRows = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__spreadArrays"])(res);
            _this.tableTemp = _this.tableRows.map(function (prop, key) {
                return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
            });
            // console.log('Svc: ', this.tableTemp)
            _this.calculateCharts();
        }, function () {
            // Unsuccess
        }, function () {
            // After
            _this.getCharts();
        });
    };
    ManagementUserComponent.prototype.getCharts = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            _this.getChart();
        });
    };
    ManagementUserComponent.prototype.getChart = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_4__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["XYChart"]);
        // Add data
        chart.data = [{
                "month": "Jan",
                "count": this.chartJan
            }, {
                "month": "Feb",
                "count": this.chartFeb
            }, {
                "month": "Mar",
                "count": this.chartMar
            }, {
                "month": "Apr",
                "count": this.chartApr
            }, {
                "month": "May",
                "count": this.chartMar
            }, {
                "month": "Jun",
                "count": this.chartJun
            }, {
                "month": "Jul",
                "count": this.chartJul
            }, {
                "month": "Aug",
                "count": this.chartAug
            }, {
                "month": "Sep",
                "count": this.chartSep
            }, {
                "month": "Oct",
                "count": this.chartOct
            }, {
                "month": "Nov",
                "count": this.chartNov
            }, {
                "month": "Dec",
                "count": this.chartDec
            }
        ];
        // Create axes
        var categoryAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["CategoryAxis"]());
        categoryAxis.dataFields.category = "month";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.adapter.add("dy", function (dy, target) {
            if (target.dataItem && target.dataItem.index && 2 == 2) {
                return dy + 25;
            }
            return dy;
        });
        var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["ValueAxis"]());
        // Create series
        var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_5__["ColumnSeries"]());
        series.dataFields.valueY = "count";
        series.dataFields.categoryX = "month";
        series.name = "count";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;
        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;
        this.chart = chart;
    };
    ManagementUserComponent.prototype.toggleChange = function () {
        this.transEnabled = !this.transEnabled;
    };
    ManagementUserComponent.prototype.calculateCharts = function () {
        var _this = this;
        this.chartJan = 0;
        this.chartFeb = 0;
        this.chartMar = 0;
        this.chartApr = 0;
        this.chartMay = 0;
        this.chartJun = 0;
        this.chartJul = 0;
        this.chartAug = 0;
        this.chartSep = 0;
        this.chartOct = 0;
        this.chartNov = 0;
        this.chartDec = 0;
        this.tableRows.forEach((function (row) {
            var checkerDate = moment__WEBPACK_IMPORTED_MODULE_3__(row.agency_name);
            var checkerDateMonth = checkerDate.month();
            if (checkerDateMonth == 0) {
                _this.chartJan += 1;
            }
            else if (checkerDateMonth == 1) {
                _this.chartFeb += 1;
            }
            else if (checkerDateMonth == 2) {
                _this.chartMar += 1;
            }
            else if (checkerDateMonth == 3) {
                _this.chartApr += 1;
            }
            else if (checkerDateMonth == 4) {
                _this.chartMay += 1;
            }
            else if (checkerDateMonth == 5) {
                _this.chartJun += 1;
            }
            else if (checkerDateMonth == 6) {
                _this.chartJul += 1;
            }
            else if (checkerDateMonth == 7) {
                _this.chartAug += 1;
            }
            else if (checkerDateMonth == 8) {
                _this.chartSep += 1;
            }
            else if (checkerDateMonth == 9) {
                _this.chartOct += 1;
            }
            else if (checkerDateMonth == 10) {
                _this.chartNov += 1;
            }
            else if (checkerDateMonth == 11) {
                _this.chartDec += 1;
            }
        }));
    };
    ManagementUserComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementUserComponent.prototype.closeModal = function () {
        this.modal.hide();
        this.registerForm.reset();
    };
    ManagementUserComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_8___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk cipta pengguna baru ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.register();
            }
        });
    };
    ManagementUserComponent.prototype.deleteUser = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_8___default.a.fire({
            title: "Pengesahan",
            text: "Anda pasti untuk buang data pengguna ini?",
            type: "warning",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
            }
        });
    };
    ManagementUserComponent.prototype.register = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_8___default.a.fire({
            title: "Berjaya",
            text: "Akaun pengguna baru telah dicipta!",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.modal.hide();
                _this.registerForm.reset();
            }
        });
    };
    ManagementUserComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["BsModalService"] },
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_9__["FormBuilder"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    ManagementUserComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-user',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-user.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-user/management-user.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-user.component.scss */ "./src/app/core/admin/management-user/management-user.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_7__["BsModalService"],
            _angular_forms__WEBPACK_IMPORTED_MODULE_9__["FormBuilder"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], ManagementUserComponent);
    return ManagementUserComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/management-userguide/management-userguide.component.scss":
/*!*************************************************************************************!*\
  !*** ./src/app/core/admin/management-userguide/management-userguide.component.scss ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable .datatable-body {\n  max-height: 40vh !important;\n  overflow-y: scroll;\n}\n\n.card {\n  min-height: 680px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11c2VyZ3VpZGUvbWFuYWdlbWVudC11c2VyZ3VpZGUuY29tcG9uZW50LnNjc3MiLCJzcmMvYXBwL2NvcmUvYWRtaW4vbWFuYWdlbWVudC11c2VyZ3VpZGUvbWFuYWdlbWVudC11c2VyZ3VpZGUuY29tcG9uZW50LnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7O0VBRUksb0NBQUE7RUFDQSxxQkFBQTtBQ0NKOztBRENBO0VBQ0ksY0FBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxnQkFBQTtFQUNBLGlCQUFBO0VBQ0EsZ0JBQUE7QUNFSjs7QURBQTtFQUNJLDJCQUFBO0VBQ0Esa0JBQUE7QUNHSjs7QURBQTtFQUNJLGlCQUFBO0FDR0oiLCJmaWxlIjoic3JjL2FwcC9jb3JlL2FkbWluL21hbmFnZW1lbnQtdXNlcmd1aWRlL21hbmFnZW1lbnQtdXNlcmd1aWRlLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG4uZXJyb3ItbWVzc2FnZSB7XG4gICAgY29sb3I6ICNmNTM2NWM7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gICAgZm9udC1zaXplOiAwLjhlbTtcbiAgICBwYWRkaW5nLXRvcDogNXB4O1xuICAgIHBhZGRpbmctYm90dG9tOiAwO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG59XG46Om5nLWRlZXAgLm5neC1kYXRhdGFibGUgLmRhdGF0YWJsZS1ib2R5IHtcbiAgICBtYXgtaGVpZ2h0OiA0MHZoICFpbXBvcnRhbnQ7XG4gICAgb3ZlcmZsb3cteTogc2Nyb2xsO1xufVxuXG4uY2FyZCB7XG4gICAgbWluLWhlaWdodDogNjgwcHg7XG59IiwiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMEE4MEI2ICFpbXBvcnRhbnQ7XG4gIGJvcmRlci1jb2xvcjogIzBBODBCNjtcbn1cblxuLmVycm9yLW1lc3NhZ2Uge1xuICBjb2xvcjogI2Y1MzY1YztcbiAgdGV4dC1hbGlnbjogcmlnaHQ7XG4gIGZvbnQtc2l6ZTogMC44ZW07XG4gIHBhZGRpbmctdG9wOiA1cHg7XG4gIHBhZGRpbmctYm90dG9tOiAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG46Om5nLWRlZXAgLm5neC1kYXRhdGFibGUgLmRhdGF0YWJsZS1ib2R5IHtcbiAgbWF4LWhlaWdodDogNDB2aCAhaW1wb3J0YW50O1xuICBvdmVyZmxvdy15OiBzY3JvbGw7XG59XG5cbi5jYXJkIHtcbiAgbWluLWhlaWdodDogNjgwcHg7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/management-userguide/management-userguide.component.ts":
/*!***********************************************************************************!*\
  !*** ./src/app/core/admin/management-userguide/management-userguide.component.ts ***!
  \***********************************************************************************/
/*! exports provided: SelectionType, ManagementUserguideComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ManagementUserguideComponent", function() { return ManagementUserguideComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");





var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ManagementUserguideComponent = /** @class */ (function () {
    function ManagementUserguideComponent(formBuilder, modalService) {
        this.formBuilder = formBuilder;
        this.modalService = modalService;
        // Toggle
        this.editEnabled = false;
        this.formDataset = false;
        this.editFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-lg"
        };
        this.entries = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
            {
                tajuk: "MyGeo Explorer ",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ManagementUserguideComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ManagementUserguideComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ManagementUserguideComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ManagementUserguideComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ManagementUserguideComponent.prototype.ngOnInit = function () {
        this.editForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
    };
    ManagementUserguideComponent.prototype.toggleEdit = function () {
        this.editEnabled = !this.editEnabled;
    };
    ManagementUserguideComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menukar gambar profil ini",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementUserguideComponent.prototype.confirmSave = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
                _this.toggleEdit();
            }
        });
    };
    ManagementUserguideComponent.prototype.confirmPassword = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk tukar laluan",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ManagementUserguideComponent.prototype.edit = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya disimpan",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.editForm.reset();
            }
        });
    };
    ManagementUserguideComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ManagementUserguideComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ManagementUserguideComponent.ctorParameters = function () { return [
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"] }
    ]; };
    ManagementUserguideComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-management-userguide',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./management-userguide.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/management-userguide/management-userguide.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./management-userguide.component.scss */ "./src/app/core/admin/management-userguide/management-userguide.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            ngx_bootstrap__WEBPACK_IMPORTED_MODULE_4__["BsModalService"]])
    ], ManagementUserguideComponent);
    return ManagementUserguideComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/profile/profile.component.scss":
/*!***********************************************************!*\
  !*** ./src/app/core/admin/profile/profile.component.scss ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vcHJvZmlsZS9wcm9maWxlLmNvbXBvbmVudC5zY3NzIn0= */");

/***/ }),

/***/ "./src/app/core/admin/profile/profile.component.ts":
/*!*********************************************************!*\
  !*** ./src/app/core/admin/profile/profile.component.ts ***!
  \*********************************************************/
/*! exports provided: ProfileComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProfileComponent", function() { return ProfileComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");
/* harmony import */ var src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/shared/services/auth/auth.service */ "./src/app/shared/services/auth/auth.service.ts");





var ProfileComponent = /** @class */ (function () {
    function ProfileComponent(formBuilder, authService) {
        this.formBuilder = formBuilder;
        this.authService = authService;
        // Toggle
        this.editEnabled = false;
        this.formDataset = false;
        this.editFormMessages = {
            'name': [
                { type: 'required', message: 'Name is required' }
            ],
            'email': [
                { type: 'required', message: 'Email is required' },
                { type: 'email', message: 'A valid email is required' }
            ]
        };
    }
    ProfileComponent.prototype.ngOnInit = function () {
        this.editForm = this.formBuilder.group({
            name: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required
            ])),
            email: new _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormControl"]('', _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].compose([
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].required,
                _angular_forms__WEBPACK_IMPORTED_MODULE_3__["Validators"].email
            ]))
        });
        if (this.authService.userRole == 1) {
            this.auth = 1;
        }
        else if (this.authService.userRole == 2) {
            this.auth = 2;
        }
        else if (this.authService.userRole == 3) {
            this.auth = 3;
        }
        else if (this.authService.userRole == 4) {
            this.auth = 4;
        }
        else if (this.authService.userRole == 5) {
            this.auth = 5;
        }
        else if (this.authService.userRole == 6) {
            this.auth = 6;
        }
    };
    ProfileComponent.prototype.toggleEdit = function () {
        this.editEnabled = !this.editEnabled;
    };
    ProfileComponent.prototype.confirm = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menukar gambar profil ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ProfileComponent.prototype.confirmSave = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk menyimpan maklumat yang disunting ini?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
                _this.toggleEdit();
            }
        });
    };
    ProfileComponent.prototype.confirmPassword = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Pengesahan",
            text: "Adakah anda pasti untuk tukar laluan?",
            type: "info",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-info",
            confirmButtonText: "Pasti",
            showCancelButton: true,
            cancelButtonClass: "btn btn-danger",
            cancelButtonText: "Batal"
        }).then(function (result) {
            if (result.value) {
                _this.edit();
            }
        });
    };
    ProfileComponent.prototype.edit = function () {
        var _this = this;
        sweetalert2__WEBPACK_IMPORTED_MODULE_2___default.a.fire({
            title: "Berjaya",
            text: "Kemaskini telah berjaya disimpan",
            type: "success",
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success",
            confirmButtonText: "Tutup"
        }).then(function (result) {
            if (result.value) {
                _this.editForm.reset();
            }
        });
    };
    ProfileComponent.ctorParameters = function () { return [
        { type: _angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"] },
        { type: src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"] }
    ]; };
    ProfileComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-profile',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./profile.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/profile/profile.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./profile.component.scss */ "./src/app/core/admin/profile/profile.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [_angular_forms__WEBPACK_IMPORTED_MODULE_3__["FormBuilder"],
            src_app_shared_services_auth_auth_service__WEBPACK_IMPORTED_MODULE_4__["AuthService"]])
    ], ProfileComponent);
    return ProfileComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/report/report.component.scss":
/*!*********************************************************!*\
  !*** ./src/app/core/admin/report/report.component.scss ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2NvcmUvYWRtaW4vcmVwb3J0L3JlcG9ydC5jb21wb25lbnQuc2NzcyJ9 */");

/***/ }),

/***/ "./src/app/core/admin/report/report.component.ts":
/*!*******************************************************!*\
  !*** ./src/app/core/admin/report/report.component.ts ***!
  \*******************************************************/
/*! exports provided: ReportComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ReportComponent", function() { return ReportComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! src/app/shared/services/mocks/mocks.service */ "./src/app/shared/services/mocks/mocks.service.ts");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");






_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_5__["default"]);
var ReportComponent = /** @class */ (function () {
    function ReportComponent(mockService, zone) {
        this.mockService = mockService;
        this.zone = zone;
        this.dataChart = [];
        this.dataChart2 = [];
        this.dataChart3 = [];
        // Datepicker
        this.bsDPConfig = {
            isAnimated: true,
            containerClass: 'theme-default'
        };
        this.getData();
    }
    ReportComponent.prototype.ngOnInit = function () {
    };
    ReportComponent.prototype.ngOnDestroy = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            if (_this.chart) {
                _this.chart.dispose();
            }
            if (_this.chart1) {
                _this.chart1.dispose();
            }
            if (_this.chart2) {
                _this.chart2.dispose();
            }
            if (_this.chart3) {
                _this.chart3.dispose();
            }
        });
    };
    ReportComponent.prototype.getData = function () {
        var _this = this;
        this.mockService.getAll('admin-report/report-data-1.json').subscribe(function (res) {
            // Success
            _this.dataChart = res;
        }, function () {
            // Unsuccess
        }, function () {
            // After
            _this.mockService.getAll('admin-report/report-data-2.json').subscribe(function (res) {
                // Success
                _this.dataChart2 = res;
            }, function () {
                // Unsuccess
            }, function () {
                // After
                _this.mockService.getAll('admin-report/report-data-3.json').subscribe(function (res) {
                    // Success
                    _this.dataChart3 = res;
                }, function () {
                    // Unsuccess
                }, function () {
                    // After
                    _this.getCharts();
                });
            });
        });
    };
    ReportComponent.prototype.getCharts = function () {
        var _this = this;
        this.zone.runOutsideAngular(function () {
            _this.getChart();
            _this.getChart1();
            _this.getChart2();
            _this.getChart3();
        });
    };
    ReportComponent.prototype.getChart = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
        chart.paddingRight = 20;
        var data = this.dataChart;
        chart.data = data;
        chart.dateFormatter.inputDateFormat = "yyyy";
        var dateAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["DateAxis"]());
        dateAxis.renderer.minGridDistance = 50;
        dateAxis.baseInterval = { timeUnit: "year", count: 2 };
        var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
        valueAxis.tooltip.disabled = true;
        var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["StepLineSeries"]());
        series.dataFields.dateX = "year";
        series.dataFields.valueY = "amount";
        series.tooltipText = "{valueY.amount}";
        series.strokeWidth = 3;
        chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
        chart.cursor.xAxis = dateAxis;
        chart.cursor.fullWidthLineX = true;
        chart.cursor.lineX.strokeWidth = 0;
        chart.cursor.lineX.fill = chart.colors.getIndex(2);
        chart.cursor.lineX.fillOpacity = 0.1;
        chart.scrollbarX = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Scrollbar"]();
        this.chart = chart;
    };
    ReportComponent.prototype.getChart1 = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv1", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
        var data = [];
        var open = 100;
        var close = 250;
        for (var i = 1; i < 120; i++) {
            open += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 4);
            close = Math.round(open + Math.random() * 5 + i / 5 - (Math.random() < 0.5 ? 1 : -1) * Math.random() * 2);
            data.push({ date: new Date(2018, 0, i), open: open, close: close });
        }
        chart.data = data;
        var dateAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["DateAxis"]());
        var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
        valueAxis.tooltip.disabled = true;
        var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        series.dataFields.dateX = "date";
        series.dataFields.openValueY = "open";
        series.dataFields.valueY = "close";
        series.tooltipText = "open: {openValueY.value} close: {valueY.value}";
        series.sequencedInterpolation = true;
        series.fillOpacity = 0.3;
        series.defaultState.transitionDuration = 1000;
        series.tensionX = 0.8;
        var series2 = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        series2.dataFields.dateX = "date";
        series2.dataFields.valueY = "open";
        series2.sequencedInterpolation = true;
        series2.defaultState.transitionDuration = 1500;
        series2.stroke = chart.colors.getIndex(6);
        series2.tensionX = 0.8;
        chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
        chart.cursor.xAxis = dateAxis;
        chart.scrollbarX = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Scrollbar"]();
        this.chart1 = chart;
    };
    ReportComponent.prototype.getChart2 = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv2", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
        // Add data
        chart.data = this.dataChart2;
        // Create axes
        var valueAxisX = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
        valueAxisX.title.text = 'X Axis';
        valueAxisX.renderer.minGridDistance = 40;
        // Create value axis
        var valueAxisY = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
        valueAxisY.title.text = 'Y Axis';
        // Create series
        var lineSeries = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        lineSeries.dataFields.valueY = "ay";
        lineSeries.dataFields.valueX = "ax";
        lineSeries.strokeOpacity = 0;
        var lineSeries2 = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        lineSeries2.dataFields.valueY = "by";
        lineSeries2.dataFields.valueX = "bx";
        lineSeries2.strokeOpacity = 0;
        // Add a bullet
        var bullet = lineSeries.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["Bullet"]());
        // Add a triangle to act as am arrow
        var arrow = bullet.createChild(_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Triangle"]);
        arrow.horizontalCenter = "middle";
        arrow.verticalCenter = "middle";
        arrow.strokeWidth = 0;
        arrow.fill = chart.colors.getIndex(0);
        arrow.direction = "top";
        arrow.width = 12;
        arrow.height = 12;
        // Add a bullet
        var bullet2 = lineSeries2.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["Bullet"]());
        // Add a triangle to act as am arrow
        var arrow2 = bullet2.createChild(_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Triangle"]);
        arrow2.horizontalCenter = "middle";
        arrow2.verticalCenter = "middle";
        arrow2.rotation = 180;
        arrow2.strokeWidth = 0;
        arrow2.fill = chart.colors.getIndex(3);
        arrow2.direction = "top";
        arrow2.width = 12;
        arrow2.height = 12;
        //add the trendlines
        var trend = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        trend.dataFields.valueY = "value2";
        trend.dataFields.valueX = "value";
        trend.strokeWidth = 2;
        trend.stroke = chart.colors.getIndex(0);
        trend.strokeOpacity = 0.7;
        trend.data = [
            { "value": 1, "value2": 2 },
            { "value": 12, "value2": 11 }
        ];
        var trend2 = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        trend2.dataFields.valueY = "value2";
        trend2.dataFields.valueX = "value";
        trend2.strokeWidth = 2;
        trend2.stroke = chart.colors.getIndex(3);
        trend2.strokeOpacity = 0.7;
        trend2.data = [
            { "value": 1, "value2": 1 },
            { "value": 12, "value2": 19 }
        ];
        //scrollbars
        chart.scrollbarX = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Scrollbar"]();
        chart.scrollbarY = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Scrollbar"]();
        this.chart2 = chart;
    };
    ReportComponent.prototype.getChart3 = function () {
        var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["create"]("chartdiv3", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChart"]);
        // Add data
        chart.data = this.dataChart3;
        // Set input format for the dates
        chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
        // Create axes
        var dateAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["DateAxis"]());
        var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["ValueAxis"]());
        // Create series
        var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["LineSeries"]());
        series.dataFields.valueY = "value";
        series.dataFields.dateX = "date";
        series.tooltipText = "{value}";
        series.strokeWidth = 2;
        series.minBulletDistance = 15;
        // Drop-shaped tooltips
        series.tooltip.background.cornerRadius = 20;
        series.tooltip.background.strokeOpacity = 0;
        series.tooltip.pointerOrientation = "vertical";
        series.tooltip.label.minWidth = 40;
        series.tooltip.label.minHeight = 40;
        series.tooltip.label.textAlign = "middle";
        series.tooltip.label.textValign = "middle";
        // Make bullets grow on hover
        var bullet = series.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["CircleBullet"]());
        bullet.circle.strokeWidth = 2;
        bullet.circle.radius = 4;
        bullet.circle.fill = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["color"]("#fff");
        var bullethover = bullet.states.create("hover");
        bullethover.properties.scale = 1.3;
        // Make a panning cursor
        chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYCursor"]();
        chart.cursor.behavior = "panXY";
        chart.cursor.xAxis = dateAxis;
        chart.cursor.snapToSeries = series;
        // Create vertical scrollbar and place it before the value axis
        chart.scrollbarY = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_3__["Scrollbar"]();
        chart.scrollbarY.parent = chart.leftAxesContainer;
        chart.scrollbarY.toBack();
        // Create a horizontal scrollbar with previe and place it underneath the date axis
        var scrollbarX = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_4__["XYChartScrollbar"]();
        scrollbarX.series.push(series);
        chart.scrollbarX = scrollbarX;
        chart.scrollbarX.parent = chart.bottomAxesContainer;
        dateAxis.start = 0.79;
        dateAxis.keepSelection = true;
        this.chart3 = chart;
    };
    ReportComponent.ctorParameters = function () { return [
        { type: src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"] },
        { type: _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"] }
    ]; };
    ReportComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-report',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./report.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/report/report.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./report.component.scss */ "./src/app/core/admin/report/report.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [src_app_shared_services_mocks_mocks_service__WEBPACK_IMPORTED_MODULE_2__["MocksService"],
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["NgZone"]])
    ], ReportComponent);
    return ReportComponent;
}());



/***/ }),

/***/ "./src/app/core/admin/valuation/valuation.component.scss":
/*!***************************************************************!*\
  !*** ./src/app/core/admin/valuation/valuation.component.scss ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".btn-primary,\n.bg-primary {\n  background-color: #0A80B6 !important;\n  border-color: #0A80B6;\n}\n\n.error-message {\n  color: #f5365c;\n  text-align: right;\n  font-size: 0.8em;\n  padding-top: 5px;\n  padding-bottom: 0;\n  margin-bottom: 0;\n}\n\n::ng-deep .ngx-datatable {\n  width: auto;\n}\n\n.card {\n  min-height: 680px;\n}\n\n.scroll {\n  overflow: auto;\n}\n\n.custom-control-label {\n  font-size: medium !important;\n}\n\ntable,\nth,\ntd {\n  border: 1px solid black;\n}\n\nth,\ntd {\n  padding: 15px;\n}\n\ntable {\n  max-width: 900px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9BcHBsaWNhdGlvbnMvTUFNUC9odGRvY3MvYWZpcWZlL3dlYi9zcmMvYXBwL2NvcmUvYWRtaW4vdmFsdWF0aW9uL3ZhbHVhdGlvbi5jb21wb25lbnQuc2NzcyIsInNyYy9hcHAvY29yZS9hZG1pbi92YWx1YXRpb24vdmFsdWF0aW9uLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOztFQUVJLG9DQUFBO0VBQ0EscUJBQUE7QUNDSjs7QURFQTtFQUNJLGNBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0VBQ0EsZ0JBQUE7RUFDQSxpQkFBQTtFQUNBLGdCQUFBO0FDQ0o7O0FER0k7RUFDSSxXQUFBO0FDQVI7O0FESUE7RUFDSSxpQkFBQTtBQ0RKOztBRElBO0VBQ0ksY0FBQTtBQ0RKOztBRElBO0VBQ0ksNEJBQUE7QUNESjs7QURJQTs7O0VBR0ksdUJBQUE7QUNESjs7QURJQTs7RUFFSSxhQUFBO0FDREo7O0FESUE7RUFDSSxnQkFBQTtBQ0RKIiwiZmlsZSI6InNyYy9hcHAvY29yZS9hZG1pbi92YWx1YXRpb24vdmFsdWF0aW9uLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmJ0bi1wcmltYXJ5LFxuLmJnLXByaW1hcnkge1xuICAgIGJhY2tncm91bmQtY29sb3I6ICMwQTgwQjYgIWltcG9ydGFudDtcbiAgICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgICBjb2xvcjogI2Y1MzY1YztcbiAgICB0ZXh0LWFsaWduOiByaWdodDtcbiAgICBmb250LXNpemU6IDAuOGVtO1xuICAgIHBhZGRpbmctdG9wOiA1cHg7XG4gICAgcGFkZGluZy1ib3R0b206IDA7XG4gICAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIHtcbiAgICAubmd4LWRhdGF0YWJsZSB7XG4gICAgICAgIHdpZHRoOiBhdXRvO1xuICAgIH1cbn1cblxuLmNhcmQge1xuICAgIG1pbi1oZWlnaHQ6IDY4MHB4O1xufVxuXG4uc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogYXV0bztcbn1cblxuLmN1c3RvbS1jb250cm9sLWxhYmVsIHtcbiAgICBmb250LXNpemU6IG1lZGl1bSAhaW1wb3J0YW50O1xufVxuXG50YWJsZSxcbnRoLFxudGQge1xuICAgIGJvcmRlcjogMXB4IHNvbGlkIGJsYWNrO1xufVxuXG50aCxcbnRkIHtcbiAgICBwYWRkaW5nOiAxNXB4O1xufVxuXG50YWJsZXtcbiAgICBtYXgtd2lkdGg6IDkwMHB4O1xufSIsIi5idG4tcHJpbWFyeSxcbi5iZy1wcmltYXJ5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzBBODBCNiAhaW1wb3J0YW50O1xuICBib3JkZXItY29sb3I6ICMwQTgwQjY7XG59XG5cbi5lcnJvci1tZXNzYWdlIHtcbiAgY29sb3I6ICNmNTM2NWM7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xuICBmb250LXNpemU6IDAuOGVtO1xuICBwYWRkaW5nLXRvcDogNXB4O1xuICBwYWRkaW5nLWJvdHRvbTogMDtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuOjpuZy1kZWVwIC5uZ3gtZGF0YXRhYmxlIHtcbiAgd2lkdGg6IGF1dG87XG59XG5cbi5jYXJkIHtcbiAgbWluLWhlaWdodDogNjgwcHg7XG59XG5cbi5zY3JvbGwge1xuICBvdmVyZmxvdzogYXV0bztcbn1cblxuLmN1c3RvbS1jb250cm9sLWxhYmVsIHtcbiAgZm9udC1zaXplOiBtZWRpdW0gIWltcG9ydGFudDtcbn1cblxudGFibGUsXG50aCxcbnRkIHtcbiAgYm9yZGVyOiAxcHggc29saWQgYmxhY2s7XG59XG5cbnRoLFxudGQge1xuICBwYWRkaW5nOiAxNXB4O1xufVxuXG50YWJsZSB7XG4gIG1heC13aWR0aDogOTAwcHg7XG59Il19 */");

/***/ }),

/***/ "./src/app/core/admin/valuation/valuation.component.ts":
/*!*************************************************************!*\
  !*** ./src/app/core/admin/valuation/valuation.component.ts ***!
  \*************************************************************/
/*! exports provided: SelectionType, ValuationComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectionType", function() { return SelectionType; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ValuationComponent", function() { return ValuationComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm5/core.js");
/* harmony import */ var ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ngx-bootstrap */ "./node_modules/ngx-bootstrap/__ivy_ngcc__/esm5/ngx-bootstrap.js");
/* harmony import */ var dropzone__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! dropzone */ "./node_modules/dropzone/dist/dropzone.js");
/* harmony import */ var dropzone__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(dropzone__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm5/forms.js");




dropzone__WEBPACK_IMPORTED_MODULE_3___default.a.autoDiscover = false;

var SelectionType;
(function (SelectionType) {
    SelectionType["single"] = "single";
    SelectionType["multi"] = "multi";
    SelectionType["multiClick"] = "multiClick";
    SelectionType["cell"] = "cell";
    SelectionType["checkbox"] = "checkbox";
})(SelectionType || (SelectionType = {}));
var ValuationComponent = /** @class */ (function () {
    function ValuationComponent(modalService) {
        this.modalService = modalService;
        this.checkOther = "null";
        this.myForm = new _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormGroup"]({
            file: new _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormControl"]('', [_angular_forms__WEBPACK_IMPORTED_MODULE_4__["Validators"].required]),
            fileSource: new _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormControl"]('', [_angular_forms__WEBPACK_IMPORTED_MODULE_4__["Validators"].required])
        });
        // Toggle
        this.editEnabled = true;
        this.modalConfig = {
            keyboard: true,
            class: "modal-dialog-centered modal-xl"
        };
        this.entries = 5;
        this.entries2 = -1;
        this.selected = [];
        this.temp = [];
        this.rows = [
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
            {
                namapermohonan: "Permohonan Data Sungai Selangor ",
                namapemohon: "Muhammad Rahman bin Talib",
                kategori: "G2E-Pelajar",
                subkategori: "",
                tarikh: "25/02/2021",
            },
        ];
        this.SelectionType = SelectionType;
        this.temp = this.rows.map(function (prop, key) {
            return Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])(Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__assign"])({}, prop), { id: key });
        });
    }
    ValuationComponent.prototype.entriesChange = function ($event) {
        this.entries = $event.target.value;
    };
    ValuationComponent.prototype.filterTable = function ($event) {
        var val = $event.target.value;
        this.temp = this.rows.filter(function (d) {
            for (var key in d) {
                if (d[key].toLowerCase().indexOf(val) !== -1) {
                    return true;
                }
            }
            return false;
        });
    };
    ValuationComponent.prototype.onSelect = function (_a) {
        var _b;
        var selected = _a.selected;
        this.selected.splice(0, this.selected.length);
        (_b = this.selected).push.apply(_b, selected);
    };
    ValuationComponent.prototype.onActivate = function (event) {
        this.activeRow = event.row;
    };
    ValuationComponent.prototype.openModal = function (modalRef) {
        this.modal = this.modalService.show(modalRef, this.modalConfig);
    };
    ValuationComponent.prototype.closeModal = function () {
        this.modal.hide();
    };
    ValuationComponent.prototype.toggleForm = function () {
        this.editEnabled = !this.editEnabled;
    };
    ValuationComponent.prototype.ngOnInit = function () { };
    Object.defineProperty(ValuationComponent.prototype, "f", {
        get: function () {
            return this.myForm.controls;
        },
        enumerable: true,
        configurable: true
    });
    ValuationComponent.prototype.onFileChange = function (event) {
        var _this = this;
        var reader = new FileReader();
        if (event.target.files && event.target.files.length) {
            var file = event.target.files[0];
            reader.readAsDataURL(file);
            reader.onload = function () {
                _this.imageSrc = reader.result;
                //alert(this.imageSrc)
                _this.myForm.patchValue({
                    fileSource: reader.result
                });
            };
        }
    };
    ValuationComponent.ctorParameters = function () { return [
        { type: ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"] }
    ]; };
    ValuationComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-valuation',
            template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./valuation.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/core/admin/valuation/valuation.component.html")).default,
            styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./valuation.component.scss */ "./src/app/core/admin/valuation/valuation.component.scss")).default]
        }),
        Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"])("design:paramtypes", [ngx_bootstrap__WEBPACK_IMPORTED_MODULE_2__["BsModalService"]])
    ], ValuationComponent);
    return ValuationComponent;
}());



/***/ })

}]);
//# sourceMappingURL=core-admin-admin-module.js.map