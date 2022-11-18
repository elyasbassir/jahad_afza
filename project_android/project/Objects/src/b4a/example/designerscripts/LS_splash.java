package b4a.example.designerscripts;
import anywheresoftware.b4a.objects.TextViewWrapper;
import anywheresoftware.b4a.objects.ImageViewWrapper;
import anywheresoftware.b4a.BA;


public class LS_splash{

public static void LS_general(java.util.LinkedHashMap<String, anywheresoftware.b4a.keywords.LayoutBuilder.ViewWrapperAndAnchor> views, int width, int height, float scale) {
anywheresoftware.b4a.keywords.LayoutBuilder.setScaleRate(0.3);
anywheresoftware.b4a.keywords.LayoutBuilder.scaleAll(views);
views.get("background").vw.setLeft((int)((0d / 100 * width)));
views.get("background").vw.setWidth((int)((100d / 100 * width) - ((0d / 100 * width))));
views.get("background").vw.setTop((int)((0d / 100 * height)));
views.get("background").vw.setHeight((int)((100d / 100 * height) - ((0d / 100 * height))));
views.get("lable").vw.setTop((int)((views.get("logo").vw.getTop() + views.get("logo").vw.getHeight())+200d - (views.get("lable").vw.getHeight())));
//BA.debugLineNum = 8;BA.debugLine="lable.Left=50%x-200"[splash/General script]
views.get("lable").vw.setLeft((int)((50d / 100 * width)-200d));
//BA.debugLineNum = 10;BA.debugLine="logo.Bottom=background.Top+700"[splash/General script]
views.get("logo").vw.setTop((int)((views.get("background").vw.getTop())+700d - (views.get("logo").vw.getHeight())));
//BA.debugLineNum = 11;BA.debugLine="logo.Left=50%x-200"[splash/General script]
views.get("logo").vw.setLeft((int)((50d / 100 * width)-200d));
//BA.debugLineNum = 13;BA.debugLine="description.Bottom=logo.Bottom+200"[splash/General script]
views.get("description").vw.setTop((int)((views.get("logo").vw.getTop() + views.get("logo").vw.getHeight())+200d - (views.get("description").vw.getHeight())));
//BA.debugLineNum = 14;BA.debugLine="description.Left=50%x-200"[splash/General script]
views.get("description").vw.setLeft((int)((50d / 100 * width)-200d));
//BA.debugLineNum = 15;BA.debugLine="description.SetLeftAndRight(5%x,95%x)"[splash/General script]
views.get("description").vw.setLeft((int)((5d / 100 * width)));
views.get("description").vw.setWidth((int)((95d / 100 * width) - ((5d / 100 * width))));
//BA.debugLineNum = 16;BA.debugLine="description.Height=30%y"[splash/General script]
views.get("description").vw.setHeight((int)((30d / 100 * height)));

}
}