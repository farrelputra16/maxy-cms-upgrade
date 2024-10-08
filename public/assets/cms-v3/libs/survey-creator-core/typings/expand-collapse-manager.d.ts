import { CreatorBase } from "./creator-base";
import { SurveyElementAdornerBase } from "./components/action-container-view-model";
export declare class ExpandCollapseManager {
    constructor(creator: CreatorBase);
    private adorners;
    add(adorner: SurveyElementAdornerBase): void;
    remove(adorner: SurveyElementAdornerBase): void;
}
