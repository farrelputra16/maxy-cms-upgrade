import { Base, SurveyTemplateRendererTemplateData, QuestionRowModel, DragTypeOverMeEnum } from "survey-core";
import { SurveyCreatorModel } from "../creator-base";
export declare class RowViewModel extends Base {
    creator: SurveyCreatorModel;
    row: QuestionRowModel;
    templateData: SurveyTemplateRendererTemplateData;
    constructor(creator: SurveyCreatorModel, row: QuestionRowModel, templateData: SurveyTemplateRendererTemplateData);
    dragTypeOverMe: DragTypeOverMeEnum;
    get cssClasses(): string;
}
