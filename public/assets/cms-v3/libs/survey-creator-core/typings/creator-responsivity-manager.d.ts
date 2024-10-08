import { SurveyCreatorModel } from "./creator-base";
export declare class CreatorResponsivityManager {
    protected container: HTMLDivElement;
    private creator;
    private resizeObserver;
    private currentWidth;
    static screenSizeBreakpoints: {
        [key: string]: number;
    };
    private getScreenWidth;
    private initMobileView;
    private resetMobileView;
    private procesShowToolbox;
    private procesShowPageNavigator;
    private findCorrectParent;
    constructor(container: HTMLDivElement, creator: SurveyCreatorModel);
    private _process;
    process(): void;
    dispose(): void;
}
