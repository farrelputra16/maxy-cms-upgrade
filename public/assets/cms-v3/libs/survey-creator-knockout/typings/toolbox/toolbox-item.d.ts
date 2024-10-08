import * as ko from "knockout";
import { SurveyCreator } from "../creator";
import { ToolboxToolViewModel } from "survey-creator-core";
import { IQuestionToolboxItem } from "survey-creator-core";
export declare class KnockoutToolboxItemViewModel {
    protected model: ToolboxToolViewModel;
    protected item: IQuestionToolboxItem;
    protected creator: SurveyCreator;
    isCompact: boolean;
    title: ko.Observable<string>;
    iconName: ko.Observable<string>;
    constructor(model: ToolboxToolViewModel, item: IQuestionToolboxItem, creator: SurveyCreator, isCompact?: boolean);
}
