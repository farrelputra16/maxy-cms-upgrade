import * as ko from "knockout";
import { SurveyCreatorModel, PageAdorner } from "survey-creator-core";
import { PageModel } from "survey-core";
export declare class CreatorSurveyPageComponent extends PageAdorner {
    private _page;
    private pageUpdater;
    private currPage;
    constructor(creator: SurveyCreatorModel, _page: PageModel | ko.Observable<PageModel>);
    protected getPage(): PageModel;
    fixedDispose(): void;
    dispose(): void;
}
