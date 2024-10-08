import { Action, ActionContainer, Base, Question, SurveyModel } from "survey-core";
import { QuestionToolbox } from "../toolbox";
export declare abstract class SearchManager extends Base {
    searchActionBar: ActionContainer;
    filterStringPlaceholder: any;
    filterString: string;
    isVisible: boolean;
    matchCounterText: string;
    protected getSearchActions(): Action[];
    initActionBar(): void;
    clearFilterString(): void;
    protected abstract setFiterString(newValue: string, oldValue: string): any;
    protected onPropertyValueChanged(name: string, oldValue: any, newValue: any): void;
    constructor();
    dispose(): void;
}
export declare class SearchManagerToolbox extends SearchManager {
    toolbox: QuestionToolbox;
    filterStringPlaceholder: string;
    protected setFiterString(newValue: string, oldValue: string): void;
    clearFilterString(): void;
}
export declare class SearchManagerPropertyGrid extends SearchManager {
    private highlightedEditorClass;
    private currentMatchIndex;
    private currentMatch;
    filterStringPlaceholder: string;
    propertyGridNoResultsFound: string;
    survey: SurveyModel;
    isVisible: boolean;
    allMatches: Array<Question>;
    private expandAllParents;
    private switchHighlightedEditor;
    private updatedMatchCounterText;
    private navigateToEditor;
    private getAllMatches;
    protected setFiterString(newValue: string, oldValue: string): void;
    private reset;
    getSearchActions(): Action[];
    constructor();
    setSurvey(newSurvey: SurveyModel): void;
}
